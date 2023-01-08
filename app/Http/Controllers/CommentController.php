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

        $user = User::find($post->user_id);
        $user->notify(new CommentNotification);
        if ($request->ajax()) {
            return response()->json([
                'comment' => $comment,
            ]);
        }
        return redirect("/posts/{$post->id}");

    }

    public function destroy(Comment $comment)
{
    $comment->delete();
    return redirect()->back();
}



}
