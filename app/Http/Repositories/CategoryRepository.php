<?php

namespace App\Http\Repositories;

use App\Models\Category;

class CategoryRepository
{
    public function getAllCategories()
    {
        return Category::all()->toArray();
    }

    public function getCategoryNameById($categoryId)
    {
        return Category::findOrFail($categoryId)->value('name');
    }
}
