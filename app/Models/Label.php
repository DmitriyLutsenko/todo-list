<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Task;
class Label extends Model
{
    protected $fillable = [
        'title',
        'bcolor',
        'tcolor',
    ];

    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'label_task', 'label_id', 'task_id');
    }
}
