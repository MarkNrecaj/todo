<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class todo_tag extends Pivot
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'todo_id',
        'tag_id',
    ];
}
