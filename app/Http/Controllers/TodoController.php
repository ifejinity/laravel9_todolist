<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(){
        $todos = Todo::all();
        return view('todos/index', compact('todos'));
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
}
