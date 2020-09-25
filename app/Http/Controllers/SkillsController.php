<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Skill;

class SkillsController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth', ['except' => ['index', 'show']]);
        $this->middleware('auth');
    }

    public function index()
    {
        $skills = DB::table('skills')->get();

        foreach($skills as $skill){
            $skill->score = substr($skill->score, 0, -1);
        }
        return view('skills.index', [
            'skills' => $skills
        ]);
    }

    public function create()
    {
        return view('skills.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'progress' => 'required'
        ]);
        $skill = new Skill;
        $skill->name = $request->input('name');
        $skill->score = $request->input('progress').'%';
        $skill->user_id = auth()->user()->id;
        $skill->save();
        return redirect('skills');
    }



    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "name"=>"required",
            "progress"=>"reuired"
        ]);
        $skill = Skill::find($id);
        $skill->name = $request->input("name");
        $skill->score = $request->input("score")."%";
        $skill->save();
        return redirect("skills")->with('success', 'Skill updated.');
    }

    public function destroy($id)
    {
        $skill = Skill::find($id);
        if(auth()->user()->id !== $skill->user_id){
            return redirect('skills')->with('error','Unauthorized page.');
        }
        $skill->delete();
        return redirect('skills')->with('success', 'Skill deleted.');
    }
}
