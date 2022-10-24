<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePromotionRequest;
use App\Http\Requests\UpdatePromotionRequest;
use App\Models\Product;
use App\Repositories\PromotionRepository;
use App\Models\Promotion;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PromotionController extends AppBaseController
{
    /** @var PromotionRepository $promotionRepository*/
    private $promotionRepository;
    use \App\Http\Controllers\PrepareTranslations;

    public function __construct(PromotionRepository $promotionRepo)
    {
        $this->promotionRepository = $promotionRepo;
    }

    /**
     * Display a listing of the Promotion.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $promotions = Promotion::translatedIn(app()->getLocale())->get();

        return view('promotions.index')
            ->with('promotions', $promotions);
    }

    private function getPromotions(): object
    {
        return Promotion::translatedIn(app()->getLocale())->paginate(10);
    }

    public function indexPromotions(Request $request)
    {
        return view('user_views.promotion.index')
            ->with('promotions', $this->getPromotions());
    }


    public function promotionProducts(Request $request)
    {
        $promotion = $this->promotionRepository->allQuery(['id' => $request->id])->first();
        $products = Product::query()->where(['promotion_id' => $request->id])->paginate(12);


        return view('user_views.promotion.promotionproducts')
            ->with([
                'promotions' => $this->getPromotions(),
                'promotion' => $promotion,
                'products' => $products
            ]);
    }

    /**
     * Show the form for creating a new Promotion.
     *
     * @return Response
     */
    public function create()
    {
        return view('promotions.create');
    }

    /**
     * Store a newly created Promotion in storage.
     *
     * @param CreatePromotionRequest $request
     *
     * @return Response
     */
    public function store(CreatePromotionRequest $request)
    {
        $input = $request->all();
        $input = $this->prepare($input, ["name", "description"]);

        $promotion = $this->promotionRepository->create($input);

        Flash::success('Promotion saved successfully.');

        return redirect(route('promotions.index'));
    }

    /**
     * Display the specified Promotion.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $promotion = $this->promotionRepository->find($id);

        if (empty($promotion)) {
            Flash::error('Promotion not found');

            return redirect(route('promotions.index'));
        }

        return view('promotions.show')->with('promotion', $promotion);
    }

    /**
     * Show the form for editing the specified Promotion.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $promotion = $this->promotionRepository->find($id);

        if (empty($promotion)) {
            Flash::error('Promotion not found');

            return redirect(route('promotions.index'));
        }

        return view('promotions.edit')->with('promotion', $promotion);
    }

    /**
     * Update the specified Promotion in storage.
     *
     * @param int $id
     * @param UpdatePromotionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePromotionRequest $request)
    {
        $promotion = $this->promotionRepository->find($id);

        if (empty($promotion)) {
            Flash::error('Promotion not found');

            return redirect(route('promotions.index'));
        }

        $input = $this->prepare($request->all(), ["name", "description"]);
        $promotion->update($input);

        Flash::success('Promotion updated successfully.');

        return redirect(route('promotions.index'));
    }

    /**
     * Remove the specified Promotion from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $promotion = $this->promotionRepository->find($id);

        if (empty($promotion)) {
            Flash::error('Promotion not found');

            return redirect(route('promotions.index'));
        }

        $this->promotionRepository->delete($id);

        Flash::success('Promotion deleted successfully.');

        return redirect(route('promotions.index'));
    }
}
