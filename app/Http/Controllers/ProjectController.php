<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;



class ProjectController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $projects = $user->projects;

        return view('Projects.index', ['projects' => $projects]);
    }



    public function store(Request $request)
    {

        $user = Auth::user();
        // dd($user);

        $data = $request->validate([
            'name' => 'required|max:250',
            'members' => 'nullable',
        ]);



        // dd($data['members']);

        $project = Project::create($data);
        // dd($project);
        // add fillabele member

        $project->users()->attach($user->id);

        return back()->with("message", "Project has been saved");
    }


    public function redirect()
    {
        $members = User::get()->pluck('email', 'id');
        // dd($members);

        return view('Projects.create', ['members' => $members]);
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return back()->with("message", "Project has been deleted");
    }
}
