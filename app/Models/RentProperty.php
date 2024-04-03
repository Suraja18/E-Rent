<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentProperty extends Model
{
    use HasFactory;
    protected $fillable = [
        'image_1',
        'image_2',
        'image_3',
        'image_4',
        'rent_name',
        'property_type_id',
        'landlord_id',
        'building_id',
        'floor',
        'area',
        'no_of_bed',
        'monthly_house_rent',
        'description',
        'electric_charge',
        'water_charge',
        'garbage_charge',
        'status',
        'slug',
    ];
    public function building()
    {
        return $this->belongsTo(Building::class, 'building_id');
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class, 'property_type_id');
    }
}
