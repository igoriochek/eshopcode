<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Repositories\ProductSauceRepository;

use Illuminate\Http\Request;

class ProductSauceController extends AppBaseController
{
    protected $productSauceRepository;
    public function __construct(ProductSauceRepository $productSauceRepo)
    {
        $this->productSauceRepository = $productSauceRepo;
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
    public function create($request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
