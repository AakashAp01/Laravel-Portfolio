<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'blog_id',
    ];

    // A Like belongs to a User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // A Like belongs to a Blog
    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
}
