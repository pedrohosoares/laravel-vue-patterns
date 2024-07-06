<?php

namespace App\Blog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;

    public $fillable = [
        'content',
        'resume',
        'title',
        'slug',
        'thumb',
        'user_id',
        'schedule_at'
    ];

    protected static function newFactory() {
        return \Database\Factories\PostFactory::new();
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'post_categories');
    }
}
