<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CSR extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'location',
        'title_burmese',
        'location_burmese',
        'content_burmese',
        'content',
        'title_chinese',
        'location_chinese',
        'content_chinese',
        'image',
        'url_slug',
        'status',
        'author_id',
        'featured',
    ];
}
