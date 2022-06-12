<?php


namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Http\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function create(){
        return view('posts.categories', ['categories' => $this->categoryRepository->getAllCategories()]);
    }
}
