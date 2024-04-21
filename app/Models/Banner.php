<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_head',
        'user_desc',
        'tenant_head',
        'tenant_desc',
        'image_1',
        'image_2',
        'image_3',
        'image_4'
    ];
}
