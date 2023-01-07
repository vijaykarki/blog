<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Notifications\CommentNotification;

use Auth;

class CommentController extends Controller
{
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

        // $post = Post::find($request->post_id);
        $user = User::find($post->user_id);
        $user->notify(new CommentNotification);
        return view('posts.show', compact('post'));
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'post_id' => 'required',
    //         'body' => 'required',
    //     ]);

    //     $comment = new Comment;
    //     $comment->post_id = $request->post_id;
    //     $comment->body = $request->body;
    //     $comment->user_id = Auth::id();
    //     $comment->save();

    //     $post = Post::find($request->post_id);
    //     $user = User::find($post->user_id);
    //     $user->notify(new CommentNotification);

    //     return redirect('/posts/{post}/comments');
    // }

}
