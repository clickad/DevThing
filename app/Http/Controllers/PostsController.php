<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Storage;
use App\Post;
use DB;

class PostsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //If you need to use sql
        $posts = DB::select(
            'SELECT
                p.*,
                u.name,
                c.name AS categoryName
            FROM
                posts AS p
                LEFT JOIN
                    users AS u
                ON
                    p.user_id = u.id
                LEFT JOIN
                    categories AS c
                ON
                    p.category_id = c.id' );

        //Standard laravel way
        //$posts = Post::orderBy('created_at', 'desc')->get();

        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DB::select('SELECT * FROM categories');
        $outputCategories = [];
        foreach($categories AS $category){
            $outputCategories[$category->id] = $category->name;
        }
        return view('posts.create')->with('categories', $outputCategories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
            //|Get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just extesion
            $fileExt = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            //uploada image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $post = Post::find($id);

        $categories = DB::select('SELECT * FROM categories');
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error','Unauthorized page.');
        }
        $post->delete();
        if($post->cover_image != "noimage.jpg"){
            Storage::delete('public/cover_images/'. $post->cover_image);
        }
        return redirect('posts')->with('success', 'Post deleted.');
    }
}
