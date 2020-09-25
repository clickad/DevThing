<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Storage;
use App\Post;
use App\Category;
use DB;

class PostsController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth', ['except' => ['index', 'show', 'postsByCategory']]);
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = DB::table('posts')
                ->join('users', 'users.id', '=', 'posts.user_id')
                ->join('categories', 'categories.id', '=', 'posts.category_id')
                ->select('posts.*', 'users.name', 'categories.name AS categoryName')
                ->orderBy('categories.parent_category','asc')
                ->orderBy('categories.id','asc')
                ->orderBy('posts.created_at','desc')
                ->simplePaginate(10);

        return view('posts.index')->with('posts', $posts);
    }

    public function create()
    {
        $categories = DB::table('categories')
                    ->where('category_type', 1)
                    ->get();
        $outputCategories = [];
        foreach($categories AS $category){
            $outputCategories[$category->id] = $category->name;
        }
        return view('posts.create')->with('categories', $outputCategories);
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required',
            'category' => 'required',
            'cover_image' => 'image|nullable|max:6999',
        ]);

        //Handle file upload
        if($request->hasFile('cover_image')){
            //Get file name with extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just extesion
            $fileExt = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            //uploada image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.png';
        }

        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->category_id = $request->input('category');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();

        return redirect('posts')->with('success', 'Post created.');
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    public function edit($id)
    {

        $post = Post::find($id);
        $categories = DB::table('categories')
                    ->where('category_type', 1)
                    ->get();

        $outputCategories = [];
        foreach($categories AS $category){
            $outputCategories[$category->id] = $category->name;
        }

        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error','Unauthorized page.');
        }
        return view('posts.edit',[
            'post' => $post,
            'categories' => $outputCategories
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:6999'
        ]);

        if($request->hasFile('cover_image')){
            //Get file name with extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //|Get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just extesion
            $fileExt = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            //uploada image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->category_id = $request->input('category');

        if($request->hasFile('cover_image')){
            $post->cover_image = $fileNameToStore;
        }
        $post->save();

        return redirect('posts')->with('success', 'Post edited.');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error','Unauthorized page.');
        }
        $post->delete();
        if($post->cover_image != "noimage.png"){
            Storage::delete('public/cover_images/'. $post->cover_image);
        }
        return redirect('posts')->with('success', 'Post deleted.');
    }

    public function postsByCategory($id)
    {
        $posts = DB::table('posts')
                ->join('users', 'users.id', '=', 'posts.user_id')
                ->join('categories', 'categories.id', '=', 'posts.category_id')
                ->select('posts.*', 'users.name', 'categories.name AS categoryName')
                ->where('category_id', $id)
                ->simplePaginate(10);

        return view('posts.index', ['posts' => $posts]);
    }

    public function searchPost(Request $request)
    {
        $text = $request->input('text');

        //var_dump($request); die;

        $posts = DB::table('posts')
                ->join('users', 'users.id', '=', 'posts.user_id')
                ->join('categories', 'categories.id', '=', 'posts.category_id')
                ->select('posts.*', 'users.name', 'categories.name AS categoryName')
                ->where('title', 'LIKE', '%'.$text.'%')
                ->orderBy('categories.parent_category','asc')
                ->orderBy('categories.id','asc')
                ->orderBy('posts.created_at','desc')
                ->simplePaginate(10);

        return view('posts.search', ['posts' => $posts]);
    }
}
