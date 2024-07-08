<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ComplexProductController extends AppBaseController
{
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
//        $products = Product::translatedIn(app()->getLocale())->get();
        $categories = $this->categoryRepository->all(["includedInComplex"=>1], null,null,['*'],["includedInComplexOrder", "asc"]);
        $selectorsComples = array();
        foreach ($categories as $category) {
            $selectorsComples[$category->id] = $this->productsComplexForSelector($category->id);

        }
//        print_r($selectorsComples);
//        exit();
//        print_r($categories);
//        exit();
        return view('productComplex.index')
            ->with('selectorsComples', $selectorsComples)
            ->with('categories', $categories);
    }
}
