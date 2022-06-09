<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Http\Repositories\CategoryRepository;
use App\Http\Repositories\PostRepository;
use App\Http\Repositories\UserRepository;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public $postRepository;

    public $userRepository;

    public function __construct(
        PostRepository $postRepository,
        UserRepository $userRepository,
        CategoryRepository $categoryRepository,
    )
    {
        $this->postRepository = $postRepository;
        $this->userRepository = $userRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function viewList()
    {
        $posts = $this->postRepository->getAllPosts();
        // foreach($posts as $post)
        // {
        //     $post[] =
        //         ["author_name" => $this->userRepository->getUserById($post->author_id)];
        // }
        $posts = array_map(function ($post) {
            $post['author_name'] = $this->userRepository->getUsersNameById($post['author_id']);
            return $post;
        }, $posts);


        return view('posts.post-list-view', ['posts' => $posts]);
    }

    public function viewSingle($postId)
    {
        $post = $this->postRepository->getPostById($postId);
        $post['author_name'] = $this->userRepository->getUsersNameById($post['author_id']);
        // $post[] = [
        //     ...$post,
        //     $this->userRepository->getUserById($post->author_id),
        // ];

        return view('posts.post', ['post' => $post]);
    }

    public function store(Request $request, $postId = null)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'kcal' => ['required', 'integer'],
            'time' => ['required', 'integer'],
            'category_id' => ['required'],
        ]);

        $postData = [
            'title' => $request->title,
            'description' => $request->description,
            'author_id' => $request->user()->id,
            'kcal' => $request->kcal,
            'time' => $request->time,
            'category_id' => $request->category_id,
        ];

        if(!$postId){
            $post = Post::create($postData);
        } else {
            $post = Post::find($postId);
            $post->title = $request->title;
            $post->description = $request->description;
            $post->kcal = $request->kcal;
            $post->time = $request->time;
            $post->updated_at = now();

            $post->save();
        }


        $postData = [
            ...$postData,
            'author_name' => $request->user()->name
        ];

        // dd($postData);

        // event(new Created($user));

        // Auth::login($user);

        return view('posts.post', ['post' => $postData]);
    }

    public function edit($postId)
    {
        return view('posts.post-edit', [
            'post' => $this->postRepository->getPostById($postId),
            'categories' => $this->categoryRepository->getAllCategories()
        ]);
    }

    public function submitEdit(Request $request, int $postId)
    {
        return $this->store($request, $postId);
    }

    public function create()
    {
        return view('posts.post-create', ['categories' => $this->categoryRepository->getAllCategories()]);
    }
}
