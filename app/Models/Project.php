<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'link', 'type', 'description', 'images'];


    protected $casts = [
        'images' => 'array', // Automatically converts to/from JSON
    ];
}
