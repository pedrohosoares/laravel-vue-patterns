<?php

namespace App\Blog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public $fillable = [
        'content',
        'resume',
        'title',
        'slug',
        'title',
        'thumb',
        'user_id',
        'schedule_at'
    ];
}
