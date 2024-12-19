<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailTemplate extends Model
{
    use HasFactory;

    protected $table = 'email_templates';
    protected $allowedFields = ['title', 'subject', 'content','status'];
    protected $fillable = [
        'title',
        'subject',
        'content',
        'status',
    ];
}
