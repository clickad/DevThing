<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Todo;

class TodoController extends Controller
{

    public function index()
    {
        $todos = DB::table('todos')
                ->orderBy('date', 'desc')
                ->get();

                $todos = DB::table('todos')
                ->join('users', 'users.id', '=', 'todos.user_id')
                ->select('todos.*', 'users.name')
                ->get();
        return view('todo.index', [
            'todos' => $todos
        ]);
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
        return view('todo.create', [
            'categories' => $outputCategories
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);
        $todo = new Todo;
        $todo->date = date("m/d/Y");
        $todo->title = $request->input('title');
        $todo->description = $request->input('description');
        $todo->status = 0;
        $todo->user_id = auth()->user()->id;
        //return $todo;
        $todo->save();
        return redirect('todo');
    }

    public function show($id)
    {
        $todo = Todo::find($id);
        return view('todo.show', [
            'todo' => $todo
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
