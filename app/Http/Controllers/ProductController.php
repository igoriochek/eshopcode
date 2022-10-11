<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\Ratings;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use App\Traits\ProductRatings;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Response;
use DB;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class ProductController extends AppBaseController
{
    use ProductRatings;

    /** @var ProductRepository $productRepository*/
    private $productRepository;

    /** @var CategoryRepository $categoryRepository*/
    private $categoryRepository;

    use \App\Http\Controllers\forSelector;
    use \App\Http\Controllers\PrepareTranslations;

    public function __construct(CategoryRepository $categoryRepo, ProductRepository $productRepository)
    {
        $this->categoryRepository = $categoryRepo;
        $this->productRepository = $productRepository;
    }

    /**
     * Display a listing of the Product.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
//        $products = $this->productRepository->all();
        $products = Product::translatedIn(app()->getLocale())->get();
        return view('products.index')
            ->with('products', $products);
    }

    public function userProductIndex(Request $request)
    {
        $filter = $request->query('filter');
        $selCategories = $filter && array_key_exists('categories.id', $filter)
            ? $filter['categories.id']
            : array();
        $selectedProduct = $request->order != null ? $request->order : 0;

//        $categories = $this->categoryRepository->allQuery(array("parent_id"=>$request->category_id))->get();
        $categories = $this->categoryRepository->allQuery()->get();
        $orderBy = "";
        switch ($selectedProduct){
            case "0":
                $orderBy = "products.id";
                break;
            case "1":
                $orderBy = "products_translations.name";
                break;
            case "2":
                $orderBy = "products.price";
                break;
        }

        $products = QueryBuilder::for(Product::class)
            ->join('products_translations', function ($join) {
                $join->on('products.id', '=', 'products_translations.product_id')
                    ->where('products_translations.locale', '=', app()->getLocale());
            })
            ->allowedFilters([
                AllowedFilter::scope('namelike'),
                'categories.id',
                AllowedFilter::scope('pricefrom'),
                AllowedFilter::scope('priceto'),
            ])
            ->allowedIncludes('categories')
            ->orderBy($orderBy)
            ->paginate(10)
            ->appends(request()->query());

        foreach ($products as $product) {
            $product->id = $product->product_id;

            $sumAndCount = $this->calculateRatingSumAndCount($this->getProductRatings($product->id));
            $product->sum = $sumAndCount['sum'];
            $product->count = $sumAndCount['count'];
            $product->average = $this->calculateAverageRating($product->sum, $product->count);
        }

        return view('user_views.product.products_all_with_filters')
            ->with(['products'=> $products,
                'categories' => $categories,
                'filter' => $filter ? $filter : array(),
                'selCategories' => $selCategories ? explode(",",$selCategories) : array(),
                'order_list' => $this->productOrder(),
                'selectedProduct' => $selectedProduct,
//                'pricefrom' => $request->query('filter[pricefrom]') == null ? "" : $request->query('filter[pricefrom]'),
//                'priceto' => $request->query('filter[priceto]') == null ? "" : $request->query('filter[priceto]'),
            ]);
    }

    /**
     * Show the form for creating a new Product.
     *
     * @return Response
     */
    public function create()
    {
        return view('products.create',
            [ 'visible_list' => $this->visible_list,
                'categories' => $this->categoriesForSelector(),
                'promotions' => $this->promotionForSelector(),
                'discounts' => $this->discountForSelector(),
            ]
        );
    }

    /**
     * Store a newly created Product in storage.
     *
     * @param CreateProductRequest $request
     *
     * @return Response
     */
    public function store(CreateProductRequest $request)
    {
        $input = $request->all();

        if (isset($input['image']) &&  $input['image']!== null ) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/upload'), $imageName);
//            dd( $path);
            $input['image'] = "/images/upload/" .$imageName;
        }
        $input = $this->prepare($input, ["name", "description"]);

//        $product = $this->productRepository->create($input);
        $product = Product::create($input);
        if ( !empty($input['categories'] ) )
            $this->saveCategories($input['categories'], $product->id);

        Flash::success('Product saved successfully.');

        return redirect(route('products.index'));
    }

    /**
     * Display the specified Product.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        return view('products.show')->with('product', $product);
    }

    private function logUserViewedProduct($product)
    {
        $user = Auth::user();

        if ($user) $user->log("Viewed {$product->name}");
    }

    /**
     * View Product
     *
     * @param $id integer
     * @return Response
     */
    public function userViewProduct($id)
    {
        $product = $this->productRepository->find($id);
        $productRatings = $this->getProductRatings($id);

        $sumAndCount = $this->calculateRatingSumAndCount($productRatings);

        $sum = $sumAndCount['sum'];
        $count = $sumAndCount['count'];

        $this->logUserViewedProduct($product);

        return view('user_views.product.view_product')
            ->with([
                'product' => $product,
                'voted' => $this->getVotedCondition($id),
                'average' => $this->calculateAverageRating($sum, $count),
                'rateCount' => $count,
                'percentages' => $this->calculateAndGetRatingStarPercentages(
                    $count, $this->addRatingStarValues($productRatings)
                )
            ]);
    }

    /**
     * Show the form for editing the specified Product.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        return view('products.edit')->with(
            [
                'product' => $product,
                'visible_list' => $this->visible_list,
                'categories' => $this->categoriesForSelector(),
                'promotions' => $this->promotionForSelector(),
                'discounts' => $this->discountForSelector(),
            ]
        );
    }

    /**
     * Update the specified Product in storage.
     *
     * @param int $id
     * @param UpdateProductRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductRequest $request)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        $input = $request->all();
//        $product = $this->productRepository->update($request->all(), $id);

        if (isset($input['image']) && $input['image'] !== null ) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/upload'), $imageName);
            $input['image'] = '/images/upload/' .$imageName;
        }

        $input = $this->prepare($input, ["name", "description"]);

        $product->update($input);

        $product->categories()->sync($request->categories);

        Flash::success('Product updated successfully.');

        return redirect(route('products.index'));
    }



    public function saveCategories( $cats, $prod_id)  {
        foreach ($cats as $cat ){
            DB::table('category_product')->insert([
                'category_id' => $cat,
                'product_id' => $prod_id,
            ]);
        }
    }

    /**
     * Remove the specified Product from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        $this->productRepository->delete($id);

        Flash::success('Product deleted successfully.');

        return redirect(route('products.index'));
    }
}
