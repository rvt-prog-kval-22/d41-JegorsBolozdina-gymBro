<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Repositories\PostRepository;
use App\Http\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public $postRepository;

    public $userRepository;

    public function __construct(PostRepository $postRepository, UserRepository $userRepository)
    {
        $this->postRepository = $postRepository;
        $this->userRepository = $userRepository;
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

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'kcal' => ['required', 'integer'],
            'time' => ['required', 'integer'],
        ]);

        $postData = [
            'title' => $request->title,
            'description' => $request->description,
            'author_id' => $request->user()->id,
            'kcal' => $request->kcal,
            'time' => $request->time,
        ];

        $post = Post::create($postData);

        $postData = [
            ...$postData,
            'author_name' => $request->user()->name
        ];

        // dd($postData);

        // event(new Created($user));

        // Auth::login($user);

        return view('posts.post', ['post' => $postData]);
    }

    public function create()
    {
        return view('posts.post-create');
    }
}
