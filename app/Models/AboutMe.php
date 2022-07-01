<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutMe extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_paragraph',
        'second_paragraph',
        'third_paragraph',
        'fourth_paragraph'
    ];
}
