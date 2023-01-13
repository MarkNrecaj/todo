<?php

namespace App\Http\Controllers;

use App\Models\ToDo;
use Illuminate\Http\Request;
use Carbon\Carbon;


class ToDoController extends Controller
{
    public function index()
    {

        if (request('search')) {
            $todos = ToDo::where('title', 'like', '%' . request('search') . '%')
                ->orWhere('content', 'like', '%' . request('search') . '%')
                ->paginate(5);;
        } else {
            $todos = ToDo::orderBy('created_at', 'desc')->paginate(5);
        }

        return view('ToDos.index', ['todos' => $todos, 'priority' => ToDo::getPriority()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:250',
            'content' => 'required|max:200000',
            'due_date' => 'nullable|date|before:created_at',
            'priority' => 'nullable',
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
            'content' => 'required|max:200000',
            'due_date' => 'nullable|date|before:created_at',
            'priority' => 'nullable',
        ]);
        $todo->update($data);
        return back()->with("message", "Todo has been updated");
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return back()->with("message", "Todo has been deleted");
    }

    public function updateDone(Request $request, Todo $todo)
    {
        if ($todo['completed_at']) {
            $todo->update(['completed_at' => null]);
        } else {
            $todo->update(['completed_at' => now()]);
        }

        return back()->with("message", "Completed has been updated");
    }
}
