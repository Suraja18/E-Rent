<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PressMedia extends Model
{
    use HasFactory;
    protected $fillable = [
        'image_1',
        'heading',
        'type',
        'description'
    ];
}
