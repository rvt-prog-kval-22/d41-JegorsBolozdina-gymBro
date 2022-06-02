<?php

namespace App\Http\Repositories;

use App\Models\Post;

class PostRepository
{
    public function getAllPosts()
    {
        return Post::all()->toArray();
    }

    public function getPostById($postId)
    {
        return Post::findOrFail($postId);
    }

    public function deletePost($postId)
    {
        return Post::destroy($postId);
    }

    public function createPost(array $postDetails)
    {
        return Post::create($postDetails);
    }

    public function updatePost($postId, array $newDetails)
    {
        return Post::whereId($postId)->update($newDetails);
    }
}
