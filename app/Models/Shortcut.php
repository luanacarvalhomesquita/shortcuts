<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shortcut extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'note',
        'link',
        'mime',
        'file',
    ];

    protected $casts = [
        'image' => 'binary',
    ];

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return route('image.show', ['path' => $this->image]);
        }

        return null;
    }
}
