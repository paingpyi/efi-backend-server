<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slogan',
        'description',
        'benefits_block',
        'benefits_image',
        'table_block',
        'why_block',
        'downloadable_block',
        'applythis_block',
        'title_burmese',
        'slogan_burmese',
        'description_burmese',
        'benefits_block_burmese',
        'table_block_burmese',
        'why_block_burmese',
        'downloadable_block_burmese',
        'applythis_block_burmese',
        'product_photo',
        'category_id',
        'is_active',
        'slug_url',
    ];
}
