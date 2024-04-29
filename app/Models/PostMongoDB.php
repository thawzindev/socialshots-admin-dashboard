<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use MongoDB\Laravel\Eloquent\Model;

class PostMongoDB extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';

    protected $collection = 'posts';

    protected $guarded = [];

    public function comments() : HasMany
    {
        return $this->hasMany(CommentMongoDB::class, 'postId', '_id');
    }
}
