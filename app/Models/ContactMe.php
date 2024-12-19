<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMe extends Model
{
    use HasFactory;


    protected $table = 'contact_me';

    protected $fillable = ['name', 'email', 'subject', 'message'];
}
