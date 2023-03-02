<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToDo extends Model
{
    use HasFactory;

    const LOW = 'low';
    const MEDIUM = 'medium';
    const HIGH = 'high';
    const RISK = 'risk';
    const NONE = 'none';


    protected $fillable = ['title', 'user_id', 'content', 'completed_at', 'due_date', 'priority', 'project_id', 'favorite'];

    protected $dates = ['due_date'];

    public static function getPriority()
    {
        $priority = [
            'low' => self::LOW,
            'medium' => self::MEDIUM,
            'high' => self::HIGH,
            'risk' => self::RISK,
            'none' => self::NONE,
        ];
        return $priority;
    }

    public function tags()
    {
        return $this->hasMany(Tag::class, 'todo_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
