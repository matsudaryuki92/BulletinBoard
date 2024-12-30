<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use App\Models\Post;
use App\Models\Category;

class AuthController extends Controller
{
    public function index()
    {
        $posts = Category::all();
        $posts = Post::paginate(6);

        return view('auth/admin', compact('posts'));
    }

    public function logout()
    {
        auth()->logout();
        
        return redirect('/login');
    }

    public function update(Request $request)
    {
        $post = $request->only(['content']);
        Post::find($request->id)->update($post);

        return redirect('/admin');
    }

    public function destroy(Request $request)
    {
        Post::find($request->id)->delete();
        return redirect('/admin');
    }

    public function find()
    {
        return view('find', ['keyword'=>'']);
    }

    public function search(Request $request)
    {
        $posts = Post::where('name', 'LIKE', "%{$request->keyword}%")->get();
        
        $param = [
            'keyword' => $request->keyword,
            'posts' => $posts,
        ];
        
        return view('find', $param);
    }
}
