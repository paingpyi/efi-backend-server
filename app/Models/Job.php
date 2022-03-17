<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'position',
        'department',
        'description',
        'due',
        'position_burmese',
        'department_burmese',
        'description_burmese',
        'due_burmese',
        'position_chinese',
        'department_chinese',
        'description_chinese',
        'due_chinese',
        'due_date',
        'slug_url',
        'is_vacant',
    ];
}
