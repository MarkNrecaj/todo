<?php

namespace App\Http\Controllers;

use App\Models\ToDo;
use App\Models\Tag;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class ToDoController extends Controller
{
    public function index()
    {
        if (request('search')) {
            $todos = ToDo::where('title', 'like', '%' . request('search') . '%')
                ->orWhere('content', 'like', '%' . request('search') . '%')
                ->paginate(5);
        } else {
            $todos = ToDo::orderBy('created_at', 'desc')->paginate(5);
        }
        // dd(['todos' => $todos, 'priority' => ToDo::getPriority()]);
        $tags = Tag::all();
        // dump($tags);
        // dump(compact($tags));


        return view('ToDos.index', ['todos' => $todos, 'priorities' => ToDo::getPriority(), 'tags' => $tags]);
    }

    public function store(Request $request)
    {
        // dd($request);
        $data = $request->validate([
            'title' => 'required|max:250',
            'content' => 'required|max:200000',
            'due_date' => 'nullable|date|after:now',
            'priority' => Rule::in(ToDo::getPriority()),
            // 'tags' => 'nullable',

        ]);
        $tags = explode(',', $request['tags']);

        $todo = ToDo::create($data);

        $tags = array_map(fn ($tag) => ['name' => $tag, 'todo_id' => $todo->id], $tags);
        // dd($todo);

        $tag = Tag::insert(
            $tags
        );

        return back()->with("message", "Todo has been saved");
    }

    public function edit(ToDo $todo)
    {
        return view('ToDos.edit', ['todo' => $todo, 'priorities' => ToDo::getPriority()]);
    }

    public function update(Request $request, Todo $todo)
    {
        $data = $request->validate([
            'title' => 'required|max:250',
            'content' => 'required|max:200000',
            'due_date' => 'nullable|date|after:now',
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
