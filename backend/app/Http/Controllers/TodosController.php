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

    public function update($id, Request $request) {
        Todo::find($id)->update($request->all());
    }

    public function delete($id) {
        Todo::find($id)->delete();
    }

    public function info() {
        $todos = Todo::all();
        return response()->json($todos);
    }
}