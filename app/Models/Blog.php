<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';

    protected $fillable = [
        'thumbnail',
        'title',
        'category_id',
        'content',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }

     public function likes()
     {
         return $this->hasMany(Like::class);
     }

     public function isLikedByUser()
    {
        return $this->likes()->where('user_id', Auth::id())->exists();
    }

    public function getThumbnailAttribute($value)
    {
        if ($value) {
            return url('storage/blog_thumbnail/' . $value);
        }
        return url('storage/blog_thumbnail/default_thumbnail.gif');
    }



}
