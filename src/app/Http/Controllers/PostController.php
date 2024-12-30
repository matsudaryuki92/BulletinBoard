<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function check(PostRequest $request)
    {
        $posts = $request->only(['name', 'gender', 'category_id', 'content']);
        session()->put($posts);

        return redirect('/confirm');
    }

    public function confirm()
    {
        return view('confirm');
    }

    public function fix(PostRequest $request)
    {
        $posts = $request->only(['name', 'gender', 'category_id', 'content']);

        return redirect('/')->with(compact('posts'));
    }
    
    public function store(PostRequest $request)
    {
        $posts = $request->only(['name', 'gender', 'category_id', 'content']);

        Post::create($posts);
        session()->forget($posts);

        return redirect('/thanks');
    }

    public function thanks()
    {
        return view('thanks');
    }

}
