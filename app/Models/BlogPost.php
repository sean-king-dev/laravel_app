<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'main_image',
        'ancillary_images',
        'description',
        'author_name',
        'date',
    ];

    protected $casts = [
        'date' => 'datetime', // or 'date' if you don't need time
    ];
    
}
