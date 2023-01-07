<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Auth;

class CommentController extends Controller
{
    public function __construct(){

        $this->middleware('auth')->except(['index','show']);
       
    }

    public function store(Request $request, Post $post)
{
    $request->validate([
        'body' => 'required',
    ]);

    $comment = new Comment([
        'body' => $request->body,
        'user_id' => Auth::id(),
        'post_id' => $post->id,
    ]);

    $comment->save();
    return view('posts.show', compact('post'));
    // return redirect('/posts/{post}')->with('success', 'Comment Added successfully');
    // return view('posts.comment', compact('comment'))->render();
}

}
