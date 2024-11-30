<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masterpiece extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'color',
        'description',
        'image',
        'second_image'
    ];
}
