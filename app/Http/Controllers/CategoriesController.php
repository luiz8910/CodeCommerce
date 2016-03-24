<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use Illuminate\View\View;

class CategoriesController extends Controller
{
    private $categoryModel;

    public function __construct(Category $categoryModel)
    {
        $this->categoryModel = $categoryModel;
    }

    public function index()
    {
        $categories = $this->categoryModel->all();

        return view("categories/index", compact("categories"));
    }

    public function create()
    {
        return view("categories/create");
    }


    public function store(Requests\CategoryRequest $request)
    {
        $input = $request->all();

        $category = $this->categoryModel->fill($input);

        $category->save();

        return redirect()->route("categories");
    }

    public function edit($id)
    {
        $categories = $this->categoryModel->find($id);

        return view("categories/edit", compact("categories"));
    }

    public function update(Requests\CategoryRequest $categoryRequest, $id)
    {
        $this->categoryModel->find($id)->update($categoryRequest->all());

        return redirect()->route("categories");
    }

    public function destroy($id)
    {
        $this->categoryModel->find($id)->delete();

        return redirect("categories");
    }
}
