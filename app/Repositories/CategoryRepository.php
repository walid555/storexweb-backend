<?php
namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    public function getAllCategories()
    {
        return Category::select(['id','title' , 'created_at'])->order()->paginate(10);
    }

    public function storeCategory($data)
    {
        return Category::create($data);
    }

    public function updateCategory($category ,$data)
    {
        return $category->update($data);
    }

    public function deleteCategory($category)
    {
        return $category->delete();
    }
}
