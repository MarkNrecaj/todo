<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Models\ToDo;
use App\Models\Tag;


class ProjectController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $projects = $user->projects;

        return view('Projects.index', ['projects' => $projects]);
    }

    public function showProjectTodos(Project $project)
    {
        $user = Auth::user();
        $projects = $user->projects;

        return view('Projects.project-todos', ['projects' => $projects]);
    }

    public function addTodos(Request $request, $projectId)
    {
        $user = Auth::user();
        $projects = $user->projects;

        $data = $request->validate([
            'title' => 'required|max:250',
            'content' => 'required|max:200000',
            'due_date' => 'nullable|date|after:now',
            'priority' => Rule::in(ToDo::getPriority()),
            'project_id' => $projectId,

        ]);

        $data = array_merge($data, [
            'user_id' => $request->user()->id,
        ]);

        $tags = explode(',', $request['tags']);

        $todo = ToDo::create($data);

        $tags = array_map(fn ($tag) => ['name' => $tag, 'todo_id' => $todo->id], $tags);
        // dd($todo);

        $tag = Tag::insert(
            $tags
        );

        return back()->with("message", "Todo has been saved");

        return view('Projects.project-todos', ['projects' => $projects]);
    }

    public function store(Request $request)
    {

        $user = Auth::user();
        // dd($user);

        $data = $request->validate([
            'name' => 'required|max:250',
        ]);

        $project = Project::create($data);

        $project->users()->attach($user->id);

        return back()->with("message", "Project has been saved");
    }


    public function redirect()
    {


        return view('Projects.create');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return back()->with("message", "Project has been deleted");
    }
}
