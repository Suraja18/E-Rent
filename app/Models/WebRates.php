<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebRates extends Model
{
    use HasFactory;
    protected $fillable = [
        'images',
        'title',
        'paragraph'
    ];
}
