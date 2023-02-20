<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
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
        // dd($user->id);

        $data = $request->validate([
            'name' => 'required|max:250',
            'members' => 'nullable',
        ]);

        $data = array_merge($data, [
            'user_id' => $user->id,
        ]);

        $project = Project::create($data);

        $project->users()->attach($user->id);
        // dd($data[]);
        if (array_key_exists('members', $data)) {
            $project->users()->syncWithoutDetaching($data['members']);
        }

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
