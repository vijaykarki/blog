<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Auth;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{

    
     public function __construct(){
        
         $this->middleware('auth')->except(['index','show']);
               
     }     
    public function index()
    {
        $posts = Post::with('comments')->get();

        return view('posts.home', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    
    public function store(Request $request)
    {   

        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'required',
        ]);
        $path = $request->file('image')->store('public/images');
        $post = new Post([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $path,
            'user_id' => Auth::id(),
        ]);
    
        $post->save();
    
        return redirect('/posts');
    }
    

    public function show(Post $post)
    {
        $post->increment('view_count');
        
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
{
    return view('posts.edit', compact('post'));
}

public function update(Request $request, Post $post)
{
    $this->authorize('update', $post);

    $request->validate([
        'title' => 'required',
        'body' => 'required',
        'image' => 'required',
    ]);

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('public/images');
        $post->image = $path;
    }
    $post->title = $request->title;
    $post->body = $request->body;
    $post->save();

    return redirect('/posts');
}

public function destroy(Post $post)
{
    $this->authorize('delete', $post);

    $post->delete();

    return redirect('/posts');
}

}                       
