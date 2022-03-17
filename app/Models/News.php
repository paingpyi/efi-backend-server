<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'title_burmese',
        'content_burmese',
        'content',
        'title_burmese',
        'content_burmese',
        'image',
        'url_slug',
        'status',
        'author_id',
        'featured'
    ];
}
