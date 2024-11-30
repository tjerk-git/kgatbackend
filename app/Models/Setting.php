<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_color',
        'second_color',
        'third_color',
        'main_title',
        'sub_title',
        'description'
    ];
}
