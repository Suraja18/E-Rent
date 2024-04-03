<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FloorRemain extends Model
{
    use HasFactory;
    protected $fillable = [
        'building_id',
        'floor',
        'remaining_room',   
    ];
}
