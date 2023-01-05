<?php

namespace App\Http\Controllers;

use App\Models\ToDo;
use Illuminate\Http\Request;

class ToDoController extends Controller
{
    public function index()
    {
        return view('ToDos.index');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:250',
        ]);

        ToDo::create($data);

        return back()->with("message", "Post has been saved");
    }
}
