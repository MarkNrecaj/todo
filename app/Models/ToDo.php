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


    protected $fillable = ['title', 'content', 'completed_at', 'due_date', 'priority'];

    protected $dates = ['due_date'];

    public static function getPriority()
    {
        $priority = [
            // '1' => this.LOW,
            '2' => 'medium',
            '3' => 'high',
            '4' => 'risk',
            '5' => 'none',
        ];
        return $priority;
    }
}
