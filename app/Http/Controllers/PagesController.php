<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PagesController extends Controller
{
    public function index(){
        return view('home');
    }

    public function about(){
        $title = "This is a about page.";
        return view('pages.about')->with('title', $title);
    }

    public function skills(){
        $data = array(
            'title' => 'Skills',
            'skills' => ['Support','Design','Develope']
        );
        return view('pages/skills')->with($data);
    }

}
