<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSell extends Model
{
    use HasFactory;

    protected $fillable = [
        'building_id',
        'price',
        'status',   
    ];

    public function getBuilding()
    {
        return $this->belongsTo(Building::class, 'building_id', 'id');
    } 
    public function landlord()
    {
        return $this->belongsTo(User::class, 'landlord_id', 'id');
    }
}
