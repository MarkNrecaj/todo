<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ToDo;
use App\Models\Tag;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;


class ProjectTodo extends Controller
{
    public function showProjectTodos(Project $project)
    {
        $user = Auth::user();

        // dd($project);

        return view('Projects.project-todos', ['project' => $project, 'priorities' => ToDo::getPriority()]);
    }

    public function store(Request $request, $projectId)
    {
        $user = Auth::user();
        // dd($projectId);
        // $projects = $user->projects;

        $data = $request->validate([
            'title' => 'required|max:250',
            'content' => 'required|max:200000',
            'due_date' => 'nullable|date|after:now',
            'priority' => Rule::in(ToDo::getPriority()),
            // 'project_id' => $projectId,

        ]);

        $data = array_merge($data, [
            'user_id' => $request->user()->id,
            'project_id' => intval( $projectId ),
        ]);

        // dd($data);

        $tags = explode(',', $request['tags']);

        $todo = ToDo::create($data);

        $tags = array_map(fn ($tag) => ['name' => $tag, 'todo_id' => $todo->id], $tags);
        // dd($todo);

        $tag = Tag::insert(
            $tags
        );

        return back()->with("message", "Todo has been saved");
    }
}
