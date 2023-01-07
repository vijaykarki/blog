<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
class HomeController extends Controller
{


    public function index()
    {
        $posts = Post::with('comments')->get();

        return view('posts.index', compact('posts'));
    }
}
