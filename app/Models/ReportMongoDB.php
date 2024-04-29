<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use MongoDB\Laravel\Eloquent\Model;

class ReportMongoDB extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';

    protected $collection = 'reports';

    protected $guarded = [];

    public function post() : BelongsTo
    {
        return $this->belongsTo(PostMongoDB::class, 'postId');
    }

    public function comment() : BelongsTo
    {
        return $this->belongsTo(CommentMongoDB::class, 'commentId');
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(UserMongoDB::class, 'reportUserId');
    }
}
