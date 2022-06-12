<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class HomeController extends Controller
{
    public function create()
    {
        return view('welcome', [
            'postCount' => Post::count(),
            'userCount' => User::count()
        ]);
    }
}
