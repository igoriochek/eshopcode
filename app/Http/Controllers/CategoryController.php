<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Flash;
use Illuminate\Http\Request;
use Response;

class CategoryController extends AppBaseController
{
    /** @var CategoryRepository $categoryRepository*/
    private $categoryRepository;
    private $productRepository;

    use \App\Http\Controllers\forSelector;

    public function __construct(CategoryRepository $categoryRepo, ProductRepository $productRepository)
    {
        $this->categoryRepository = $categoryRepo;
        $this->productRepository = $productRepository;
    }

    /**
     * Display a listing of the Category.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $categories = $this->categoryRepository->all();

        return view('categories.index')
            ->with('categories', $categories);
    }

    public function userRootCategories(Request $request)
    {
        $categories = $this->categoryRepository->allQuery(array("parent_id"=>null))->paginate("5");

        return view('user_views.categories_root_user')
            ->with('categories', $categories);
    }

    public function userInnerCategories(Request $request)
    {
        if (empty($request->category_id))
            return redirect(route('rootcategories'));
        $category = $this->categoryRepository->find($request->category_id);
        $categories = $this->categoryRepository->allQuery(array("parent_id"=>$request->category_id))->paginate("3");
        $products = $this->productRepository->allQuery(array("category_id"=>$request->category_id))->paginate("3");
//        dd($categories);
        return view('user_views.categories_inner_user')
            ->with(['categories'=> $categories,
                    'category' => $category,
                    'products' => $products,
                ]);
    }

    public function userViewCategory(Request $request)
    {

    }

    /**
     * Show the form for creating a new Category.
     *
     * @return Response
     */
    public function create()
    {
        return view('categories.create', [ 'visible_list' => $this->visible_list, 'categories' => $this->categoriesForSelector()]);
    }

    /**
     * Store a newly created Category in storage.
     *
     * @param CreateCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $input = $request->all();
//        dd($input);
        $category = $this->categoryRepository->create($input);

        Flash::success('Category saved successfully.');

        return redirect(route('categories.index'));
    }

    /**
     * Display the specified Category.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $category = $this->categoryRepository->find($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('categories.index'));
        }

        return view('categories.show')->with('category', $category);
    }

    /**
     * Show the form for editing the specified Category.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $category = $this->categoryRepository->find($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('categories.index'));
        }
//        dd($category);

        return view('categories.edit', [ 'visible_list' => $this->visible_list,
            'categories' => $this->categoriesForSelector(),
            'category'=>$category]);
//        )->with('category', $category);
    }

    /**
     * Update the specified Category in storage.
     *
     * @param int $id
     * @param UpdateCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCategoryRequest $request)
    {
        $category = $this->categoryRepository->find($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('categories.index'));
        }

        $category = $this->categoryRepository->update($request->all(), $id);

        Flash::success('Category updated successfully.');

        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified Category from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $category = $this->categoryRepository->find($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('categories.index'));
        }

        $this->categoryRepository->delete($id);

        Flash::success('Category deleted successfully.');

        return redirect(route('categories.index'));
    }
}
