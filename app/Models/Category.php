<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'name_burmese',
        'description_burmese',
        'name_chinese',
        'description_chinese',
        'parent_id',
        'is_active',
        'machine',
    ];
}
