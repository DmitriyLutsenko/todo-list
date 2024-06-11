<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Label;
class Task extends Model
{
    protected $fillable = [
        'title',
        'is_active',
        'description',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return \Date::parse($value)->format('l, j F Y H:i');
    }

    public function getTitleAttribute($value)
    {
        return \Str::ucfirst(\Str::lower($value));
    }

    public function label()
    {
        return $this->belongsToMany(Label::class, 'label_task', 'task_id', 'label_id');
    }
}
