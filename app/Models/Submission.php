<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Theme;

class Submission extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'attachment', 'description', 'location', 'is_approved', 'theme_id'];

    // has one submission
    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }
}
