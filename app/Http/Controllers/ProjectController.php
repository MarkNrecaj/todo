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
