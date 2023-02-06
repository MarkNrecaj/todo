<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function todos()
    {
        return $this->hasMany(ToDo::class);
    }

    /**
     * The users that belong to the project.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_project');
    }
}
