<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Categories\CreateCategoryRequest;
use App\Http\Requests\Admin\Categories\UpdateCategoryRequest;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    protected $categoryService;

    public function __construct()
    {
        $this->categoryService = new CategoryService(new CategoryRepository());
    }

    public function index()
    {
        try {

            $categories = $this->categoryService->getAll();
            return view('admin.categories.index', get_defined_vars());

        } catch (\Exception $e) {
            return redirect()->back()->with(['alert-message' => 'sorry please try later ', 'alert-type' => 'error']);
        }

    }

    public function create()
    {
      return view('admin.categories.create');
    }

    public function store(CreateCategoryRequest $request)
    {
        try {

           $this->categoryService->save($request->only(['title']));
            return redirect()->route('admin:categories.index')->with(['alert-message' => 'Category saved successfully ', 'alert-type' => 'success']);

        } catch (\Exception $e) {
            return redirect()->back()->with(['alert-message' => 'sorry please try later ', 'alert-type' => 'error']);
        }

    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit' , get_defined_vars());
    }

    public function update(Category $category , UpdateCategoryRequest $request)
    {
        try {

            $this->categoryService->update($category , $request->only(['title']));
            return redirect()->route('admin:categories.index')->with(['alert-message' => 'Category updated successfully ', 'alert-type' => 'success']);

        } catch (\Exception $e) {
            return redirect()->back()->with(['alert-message' => 'sorry please try later ', 'alert-type' => 'error']);
        }

    }

    public function destroy(Category $category)
    {
        try {

            $this->categoryService->delete($category);
            return redirect()->route('admin:categories.index')->with(['alert-message' => 'Category deleted successfully ', 'alert-type' => 'success']);

        } catch (\Exception $e) {
            return redirect()->back()->with(['alert-message' => 'sorry please try later ', 'alert-type' => 'error']);
        }

    }
}
