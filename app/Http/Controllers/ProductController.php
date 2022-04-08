<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Flash;
use Illuminate\Http\Request;
use Response;
use DB;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class ProductController extends AppBaseController
{
    /** @var ProductRepository $productRepository*/
    private $productRepository;

    /** @var CategoryRepository $categoryRepository*/
    private $categoryRepository;

    use \App\Http\Controllers\forSelector;

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
        $products = $this->productRepository->all();

        return view('products.index')
            ->with('products', $products);
    }

    public function userProductIndex(Request $request)
    {
        $filter = $request->query('filter');
        $selCategories = $filter && $filter['categories.id'] ? $filter['categories.id'] : array();

//        $pricefrom = "";
//        $priceto = "";
//        if ($filter){
//
//        }

//        $categories = $this->categoryRepository->allQuery(array("parent_id"=>$request->category_id))->get();
        $categories = $this->categoryRepository->allQuery()->get();
        $products = QueryBuilder::for(Product::class)
            ->allowedFilters([AllowedFilter::scope('namelike'), 'categories.id',AllowedFilter::scope('pricefrom'),AllowedFilter::scope('priceto'),])
            ->allowedIncludes('categories')
            ->paginate(5)
            ->appends(request()->query());
        return view('user_views.products_all_with_filters')
            ->with(['products'=> $products,
                'categories' => $categories,
                'filter' => $filter ? $filter : array(),
                'selCategories' => $selCategories ? explode(",",$selCategories) : array(),
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

//        dd($input);

        $product = $this->productRepository->create($input);

        if ($input['categories'] != null)
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


    /**
     * View Product
     *
     * @param $id integer
     * @return Response
     */
    public function userViewProduct($id)
    {
        $product = $this->productRepository->find($id);

        return view('user_views.view_product')
            ->with([
                'product'=> $product
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
        $product = $this->productRepository->update($request->all(), $id);
        if ($input['categories'] != null)
            $this->saveCategories($input['categories'], $product->id);
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
