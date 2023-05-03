<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Models\ProductSauce;
use App\Repositories\ProductSauceRepository;

use Illuminate\Http\Request;

class ProductSauceController extends AppBaseController
{
    use PrepareTranslations;
    protected $productSauceRepository;
    private readonly array $default;
    public function __construct(ProductSauceRepository $productSauceRepo)
    {
        $this->productSauceRepository = $productSauceRepo;
        $this->default = [
            0 => __('names.no'),
            1 => __('names.yes')
        ];
    }
    /**
     * Display a listing of the Customer.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index()
    {
        $productSauce = $this->productSauceRepository->all();
        return view('product_sauce.index')
            ->with('productSauce', $productSauce); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product_sauce.create')
            ->with('default', $this->default);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $productSauce = $this->productSauceRepository->create($input);
        return redirect(route('productSauce.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productSauce = $this->productSauceRepository->find($id);
        return view('product_sauce.show')
            ->with('productSauce', $productSauce);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('product_sauce.edit')
            ->with('productSauce', $this->getAccessoryById($id));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $productSauce = $this->productSauceRepository->find($id);
        $input = $this->prepare($request->all(), ['name']);
        $productSauce = $this->productSauceRepository->update($input, $id);
        return redirect(route('productSauce.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->productSauceRepository->delete($id);
        return redirect(route('productSauce.index'));
    }

    private function getAccessoryById(int $id): object
    {
        $productSauce = ProductSauce::find($id);
        return $productSauce;
    }
}
