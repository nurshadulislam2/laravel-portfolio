<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    protected $fillable = [
        'name',
        'image',
        'profession',
        'resume'
    ];
}
