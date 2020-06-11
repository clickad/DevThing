<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class HomeController extends Controller
{

    public function index()
    {
        $allCategories = Category::all();
        $categories = [];

        foreach($allCategories AS $key => $pCategory){
            if($pCategory->category_type == 0){
                $categories[$key]['name'] = $pCategory->name;
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

        //return var_dump(json_decode(json_encode($categories), true)); die;
        return view('home', [
            'categories' => json_decode(json_encode($categories), true)
        ]);
    }
}
