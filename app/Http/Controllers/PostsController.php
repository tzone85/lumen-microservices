<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Controllers\Controller;
use illuminate\Http\Request;

class PostsController extends Controller
{
    public function createPost(Request $request)
    {
        $post = Post::create($request->all());

        return response()->json($post);
    }

    public function updatePost(Request $request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->views = $request->input('views');
        $post->save();

        return response()->json($post);

    }

    public function deletePost($id)
    {
        $post = Post::find($id);
        $post->delete();

        return response()->json($post);
    }

    public function index()
    {
        $post = new Post::all();

        return response()->json($post);
    }
}
