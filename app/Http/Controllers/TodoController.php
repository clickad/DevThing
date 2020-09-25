<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Todo;

class TodoController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth', ['except' => ['index', 'show']]);
        $this->middleware('auth');
    }

    public function index()
    {
        $todos = DB::table('todos')
                ->orderBy('created_at', 'desc')
                ->get();

                $todos = DB::table('todos')
                ->join('users', 'users.id', '=', 'todos.user_id')
                ->select('todos.*', 'users.name')
                ->get();
        return view('todos.index', [
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
        return view('todos.create', [
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
        $todo->title = $request->input('title');
        $todo->description = $request->input('description');
        $todo->status = 0;
        $todo->user_id = auth()->user()->id;
        $todo->save();
        return redirect('todo');
    }

    public function show($id)
    {
        // $todo = Todo::find($id);
        // return view('todos.show', [
        //     'todo' => $todo
        // ]);
    }

    public function edit($id)
    {
        $todo = Todo::find($id);

        if(auth()->user()->id !== $todo->user_id){
            return redirect('todo')->with('error','Unauthorized page.');
        }

        return view('todos.edit', [
            'todo' => $todo
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);
        $todo = Todo::find($id);
        $todo->title = $request->input('title');
        $todo->description = $request->input('description');
        $todo->save();
        return redirect('todo')->with('success', 'Todo updated.');
    }

    public function destroy($id)
    {
        $todo = Todo::find($id);
        if(auth()->user()->id !== $todo->user_id){
            return redirect('todo')->with('error','Unauthorized page.');
        }
        $todo->delete();
        return redirect('todo')->with('success', 'Todo deleted.');
    }

    public function changeStatus($id, $status)
    {
        $todo = Todo::find($id);
        $todo->status = $status;
        $todo->save();
        return redirect('todo');
    }

}
