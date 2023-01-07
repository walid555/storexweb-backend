<?php
namespace App\Services;

use App\Models\Category;
use App\Repositories\CategoryRepository;

class CategoryService
{
    protected $categoryRepository;


    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAll()
    {
        return $this->categoryRepository->getAllCategories();
    }

    public function save($data)
    {
        return $this->categoryRepository->storeCategory($data);
    }

    public function update($category , $data)
    {
        return $this->categoryRepository->updateCategory($category , $data);
    }

    public function delete($category)
    {
        return $this->categoryRepository->deleteCategory($category);
    }
}
