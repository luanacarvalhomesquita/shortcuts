<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shortcut extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'note', 'link', 'image'];

    protected $casts = [
        'image' => 'binary',
    ];
}
