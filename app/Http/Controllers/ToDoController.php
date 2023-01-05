<?php

namespace App\Http\Controllers;

use App\Models\ToDo;
use Illuminate\Http\Request;

class ToDoController extends Controller
{
    public function index()
    {
        // $todo = ToDo::paginate(5);
        $todos = ToDo::all();
        return view('ToDos.index', ['todos' => $todos]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:250',
            'content' => 'required|max:200000',
        ]);

        ToDo::create($data);

        return back()->with("message", "Todo has been saved");
    }

    public function edit(ToDo $todo)
    {
        return view('ToDos.edit', ['todo' => $todo]);
    }

    public function update(Request $request, Todo $todo)
    {
        $data = $request->validate([
            'title' => 'required|max:250',
        ]);
        $todo->update($data);
        return back()->with("message", "Todo has been updated");
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return back()->with("message", "Todo has been deleted");
    }
}
