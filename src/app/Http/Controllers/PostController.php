<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::simplepaginate(4);

        return view('index', compact('posts'));
    }

    public function confirm(PostRequest $request)
    {
        $posts = $request->only(['name', 'content']);

        return view('confirm', compact('posts'));
    }

    public function store(PostRequest $request)
    {
        $posts = $request->only(['name', 'content']);

        Post::create($posts);

        return redirect('/');
    }

    public function update(Request $request)
    {
        $post = $request->only(['content']);
        Post::find($request->id)->update($post);

        return redirect('/');
    }

    public function destroy(Request $request)
    {
        Post::find($request->id)->delete();
        return redirect('/');
    }
}
