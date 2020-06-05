<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view('home');
    }

    public function about(){
        $title = "This is a about page.";
        return view('pages.about')->with('title', $title);;
    }

    public function services(){
        $data = array(
            'title' => 'Services',
            'services' => ['Support','Design','Develope']
        );
        return view('pages/services')->with($data);
    }
}
