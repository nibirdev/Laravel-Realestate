<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $guarded = [];

    function cat()
    {
        return $this->belongsTo(BlogCategory::class, 'cat_id', 'id');
    }
    function buser()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
