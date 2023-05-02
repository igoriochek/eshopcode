<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Models\FreeAccessory;
use App\Repositories\FreeAccessoryRepository;

use Illuminate\Http\Request;

class FreeAccessoryController extends AppBaseController
{
    use PrepareTranslations;
    protected $freeAccessoryRepository;
    public function __construct(FreeAccessoryRepository $freeAccessoryRepo)
    {
        $this->freeAccessoryRepository = $freeAccessoryRepo;
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
        $freeAccessory = $this->freeAccessoryRepository->all();
        return view('free_accessory.index')
            ->with('freeAccessory', $freeAccessory); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $freeAccessory = $this->freeAccessoryRepository->all();
        return view('free_accessory.create')
            ->with('freeAccessory', $freeAccessory);
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
        $freeAccessory = $this->freeAccessoryRepository->create($input);
        return redirect(route('freeAccessory.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $freeAccessory = $this->freeAccessoryRepository->find($id);
        return view('free_accessory.show')
            ->with('freeAccessory', $freeAccessory);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('free_accessory.edit')
            ->with('freeAccessory', $this->getAccessoryById($id));
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
        $freeAccessory = $this->freeAccessoryRepository->find($id);
        $input = $this->prepare($request->all(), ['name']);
        $freeAccessory = $this->freeAccessoryRepository->update($input, $id);
        return redirect(route('freeAccessory.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->freeAccessoryRepository->delete($id);
        return redirect(route('freeAccessory.index'));
    }

    private function getAccessoryById(int $id): object
    {
        $freeAccessory = FreeAccessory::find($id);
        return $freeAccessory;
    }
}