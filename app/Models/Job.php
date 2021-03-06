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
        'category',
        'due_text',
        'due_date',
        'slug_url',
        'linkedin_url',
        'is_vacant',
        'instant'
    ];
}
