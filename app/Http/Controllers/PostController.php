<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Auth;

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
        ]);

        $post = new Post([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => Auth::id(),
        ]);

        $post->save();

        return redirect('/posts')->with('success', 'Post created successfully');
    }

    public function show(Post $post)
    {
        $post->increment('view_count');
        
        return view('posts.show', compact('post'));
    }
}



// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Post;
// use Auth;

// class PostController extends Controller
// {
//     public function __construct(){

//         $this->middleware('auth')->except(['index','show']);
       
//     }
    
//     // public function index()
//     // {
//     //     return view('posts.index');
//     // }

//     public function index()
//     {
//         $posts = Post::all();
//         return view('posts.index', ['posts'=>$posts]);
//     }

//     public function create()
//     {
//         return view('posts.create');
//     }

//     public function store(Request $request)
//     {
//         $request->validate([
//             'title' => 'required',
//             'body' => 'required',
//         ]);

//         $post = new Post([
//             'title' => $request->title,
//             'body' => $request->body,
//             'user_id' => Auth::id(),
//         ]);

//         $post->save();

//         return redirect()->route('post.index', $post->id);
//     }

//     public function show($id)
//     {
//         $post = Post::find($id);
//         return view('posts.show', ['post'=>$post]);

//     }

//     public function edit($id)
//     {
//         $post = Post::find($id);
//         return view('posts.edit' , ['post'=>$post]);


//     }

//     public function update(Request $request, $id)
//     {
//         $post = Post::find($id);
//         if(Auth::id() == $post->user->id){
//             $validated_data = $request->validate([
//                 'title'=>'required',
//                 'body'=>'required',
//             ]);
    
//             $post->title= $validated_data['title'];
//             $post->body= $validated_data['body'];
//             $post->user_id = Auth::id(); 
//             $post->save();
//         }
//         else{
//             return "Not Authorized";
//         }
//         return redirect()->route('post.show', $post->id);
//     }

//     public function destroy($id)
//     {
//         $post = Post::find($id);
//         $post->delete();
//         return redirect()->route('post.index', $post->id);
//     }
// }


