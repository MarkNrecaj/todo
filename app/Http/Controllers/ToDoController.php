<?php

namespace App\Http\Controllers;

use App\Models\ToDo;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Policies\EditPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\UploadedFile;


class ToDoController extends Controller
{
    public function index()
    {

        if (request('search')) {
            $todos = ToDo::where('user_id', Auth::id())->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('content', 'like', '%' . request('search') . '%')
                ->paginate(5);
            // dd($todos['total']);

        } else {
            $todos = ToDo::with('tags')->where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(5);
        }
        // if (!$todos['total']) {
        //     return back()->with("message", "No todo has been found!");
        // }
        return view('ToDos.index', ['todos' => $todos, 'priorities' => ToDo::getPriority()]);
    }

    public function store(Request $request)
    {
        // dd($request->file('file-upload'), $request['file-upload']);
        $data = $request->validate([
            'title' => 'required|max:250',
            'content' => 'required|max:200000',
            'due_date' => 'nullable|date|after:now',
            'priority' => Rule::in(ToDo::getPriority()),
            'file-upload' => ['nullable', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
            // 'tags' => 'nullable',

        ]);


        $data = array_merge($data, [
            'user_id' => $request->user()->id,
        ]);
        $tags = explode(',', $request['tags']);

        $todo = ToDo::create($data);
        $filePath = null;
        if ($request->hasFile('file-upload')) {
            $filePath = $request->file('file-upload')->storeAs(
                'file-uploads',
                $todo->id . '.' . $request->file('file-upload')->getClientOriginalExtension(),
                'public',
            );
        }
        $todo->update([
            'file_path' => $filePath,
        ]);
        // dd($todo->id);

        $tags = array_map(fn ($tag) => ['name' => $tag, 'todo_id' => $todo->id], $tags);
        // dd($todo);

        $tag = Tag::insert(
            $tags
        );

        $filePath = null;
        if ($request->hasFile('file-upload')) {
            $filePath = $request->file('file-upload')->storeAs(
                'file-uploads',
                $todo->id . '.' . $request->file('file-upload')->getClientOriginalExtension(),
                'public',
            );
        }
        // dd($filePath);

        return back()->with("message", "Todo has been saved");
    }

    public function edit(ToDo $todo, Request $request)
    {
        $user = $request->user();
        if (!$user->can('update', $todo)) {
            abort(403);
        }

        $res = '';
        foreach ($todo->tags as $tag) {
            $res = $res . $tag['name'] . ',';
        }
        $res = rtrim($res, ",");
        // dd($res);

        return view('ToDos.edit', ['todo' => $todo, 'priorities' => ToDo::getPriority(), 'tags' => $res]);
    }

    public function update(Request $request, Todo $todo, Tag $tag)
    {
        $data = $request->validate([
            'title' => 'required|max:250',
            'content' => 'required|max:200000',
            'due_date' => 'nullable|date|after:now',
            'priority' => 'nullable',
        ]);

        $requestTags = explode(',', $request['tags']);

        $tag::where('todo_id', $todo->id)->delete();

        $tags = array_map(fn ($tag) => ['name' => $tag, 'todo_id' => $todo->id], $requestTags);
        $tag = Tag::insert(
            $tags
        );

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

    public function makeFavorite(Request $request, Todo $todo)
    {
        if ($todo['favorite']) {
            $todo->update(['favorite' => 0]);
        } else {
            $todo->update(['favorite' => 1]);
        }

        return back()->with("message", "Favorite has been updated");
    }
}
