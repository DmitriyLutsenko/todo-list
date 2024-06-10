<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Model;
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
}
