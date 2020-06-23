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
        $allCategories = Category::orderBy('created_at','asc')
                    ->get();

        $categories = [];

        foreach($allCategories AS $key => $pCategory){
            if($pCategory->category_type == 0){
                $categories[$key]['id'] = $pCategory->id;
                $categories[$key]['name'] = $pCategory->name;
                $categories[$key]['cover_image'] = $pCategory->cover_image;
                foreach($allCategories AS $sCategory){
                    if($sCategory->category_type == 1 && $sCategory->parent_category == $pCategory->id){
                        $categories[$key]['subCategories'][] = $sCategory;
                    }
                }
            }
        }

        foreach($categories AS &$cat){
            if(!array_key_exists('subCategories', $cat)){
                $cat['subCategories'] = [];
            }
        }
        //return $categories;
        return view('categories.index', ['categories' => $categories]);
    }

    public function create()
    {
        $categories = Category::orderBy('created_at', 'desc')
                    ->where('category_type', 0)
                    ->get();

        $outputCategories = [];
        foreach($categories AS $category){
            $outputCategories[$category->id] = $category->name;
        }
        return view('categories.create', [
            'categories' => $outputCategories
            ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'type' => 'required'
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
            $fileNameToStore = 'noimage.png';
        }

        $category = new Category;
        $category->name = $request->input('name');
        $category->user_id = auth()->user()->id;
        $category->cover_image = $fileNameToStore;
        $category->category_type = $request->input('type');
        $category->parent_category = $category->category_type == 1 ? $request->input('category') : $category->parent_category = "";

        $category->save();

        return redirect('categories')->with('success', 'Category created.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $categories = Category::orderBy('created_at', 'asc')
        ->where('category_type', 0)
        ->get();

        $category = Category::find($id);

        $outputCategories = [];
        foreach($categories AS $cat){
            $outputCategories[$cat->id] = $cat->name;
        }

        return view('categories.edit',[
            'category' => $category,
            'categories' => $outputCategories
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'type' => 'required'
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
            $fileNameToStore = 'noimage.png';
        }

        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->user_id = auth()->user()->id;
        if($request->hasFile('cover_image')){
            $category->cover_image = $fileNameToStore;
        }
        $category->category_type = $request->input('type');
        $category->parent_category = $category->category_type == 1 ? $request->input('category') : $category->parent_category = "";

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
        if($category->cover_image != "noimage.png"){
            Storage::delete('public/category_images/'. $category->cover_image);
        }
        return redirect('categories')->with('success', 'Category deleted.');
    }
}
