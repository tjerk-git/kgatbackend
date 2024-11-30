<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Submission;

class Theme extends Model
{
    use HasFactory;

    protected $fillable = [
        'titel',
        'subtitel',
        'description',
        'color',
        'is_active',
        'theme_id',
    ];

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }
}
