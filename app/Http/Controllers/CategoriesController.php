<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Storage;
use App\Category;

class CategoriesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $categories = Category::all();
        return view('categories.index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required'
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
            $path = $request->file('cover_image')->storeAs('public/category_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $category = new Category;
        $category->name = $request->input('name');
        $category->user_id = auth()->user()->id;
        if($request->hasFile('cover_image')){
            $category->cover_image = $fileNameToStore;
        }
        $category->save();

        return redirect('categories')->with('success', 'Category created.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('categories.edit',[
            'category' => $category
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required'
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
            $path = $request->file('cover_image')->storeAs('public/category_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->user_id = auth()->user()->id;
        $category->cover_image = $fileNameToStore;
        $category->save();

        return redirect('categories')->with('success', 'Category updated.');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if(auth()->user()->id !== $category->user_id){
            return redirect('/categories')->with('error','Unauthorized page.');
        }
        $category->delete();
        if($category->cover_image != "noimage.jpg"){
            Storage::delete('public/category_images/'. $category->cover_image);
        }
        return redirect('categories')->with('success', 'Category deleted.');
    }
}
