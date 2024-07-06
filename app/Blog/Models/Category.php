<?php

namespace App\Blog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;
    public $fillable = [
        'name',
        'user_id'
    ];

    public static function newFactory()
    {
        return \Database\Factories\CategoryFactory::new();
    }

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'post_categories');
    }
}
