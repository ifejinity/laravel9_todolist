<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(){
        $todos = Todo::orderby('id', 'asc')->paginate(5);
        return view('todos.index', compact('todos'));
    }

    public function add(Request $request){
        $request->validate([
            'name' => 'required',
        ]);
        Todo::create($request->post());
        return redirect()->route('todos.index');
    }

    public function delete(Todo $todo){
        $todo->delete();
        return redirect()->route('todos.index');
    }

    public function update(Todo $todo){
        $todos = Todo::where('id', $todo->id)->get();
        return view('todos.edit', compact('todos'));
    }

    public function save(Request $request, Todo $todo){
        $validatedData = $request->validate([
            'name' => 'required'
        ]);

        $todo->update($validatedData);
        return redirect()->route('todos.index');
    }
}
