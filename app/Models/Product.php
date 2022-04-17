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
        'image',
        'apply_insurance',
        'why_work_with_us',
        'lr',
        'faq',
        'attachments',
        'additional_benifits',
        'diagrams_and_table',
        'category_id',
        'is_active',
        'slug_url',
    ];
}
