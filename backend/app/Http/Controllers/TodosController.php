<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodosController extends Controller
{
    public function index() {
        $todos = Todo::all();
        return view('todos.index')->with('todos',$todos);
    }

    public function store(Request $request) {
        Todo::create($request->all());
    }

    public function edit($id) {
        $todo = Todo::find($id);
        return view('todos.edit', compact('todo'));
    }

    public function update($id, Request $request) {
        $todo = Todo::find($id);
        $todo->body = $request->body;
        $todo->save();
        return redirect(route('todos.index'));
    }

    public function delete($id) {
        Todo::find($id)->delete();
        return redirect(route('todos.index'));
    }

    public function info() {
        $todos = Todo::all();
        return response()->json($todos);
    }
}