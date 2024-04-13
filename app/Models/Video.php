<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function latestComment()
    {
        return $this->morphOne(comment::class, 'commentable')->latestOfMany();
    }
    public function oldestComment()
    {
        return $this->morphOne(comment::class, 'commentable')->oldestOfMany();
    }
    public function bestComment()
    {
        return $this->morphOne(comment::class, 'commentable')->ofMany('id', 'max');
    }
}
