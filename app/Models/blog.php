<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'images',
        'url_slug',
        'status',
        'category_id',
        'author_id',
        'featured',
        'promoted',
        'related_products'
    ];
}
