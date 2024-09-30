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
        $categories = $this->categoryRepository->all(["includedInComplex"=>1], null,null,['*'],["includedInComplexOrder", "asc"]);
        $selectorsComples = array();
        $selectorsComplesPrices = array();

        foreach ($categories as $category) {
            $complex = $this->productsComplexForSelector($category->id);
            $prices = $this->productsComplexPriceForSelector($category->id);
            
            $selectorsComples[$category->id] = [];

            foreach ($complex as $key => $complexName) {
                $price = isset($prices[$key]) ? $prices[$key] : 'N/A';
                $selectorsComples[$category->id][$key] = $complexName . ' - ' . '€ ' . number_format($price, 2);
            }
            $selectorsComplesPrices[$category->id] = $prices;
        }
        

        return view('productComplex.index')
            ->with('selectorsComples', $selectorsComples)
            ->with('selectorsComplesPrices', $selectorsComplesPrices)
            ->with('categories', $categories);
    }
}
