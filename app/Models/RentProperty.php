<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RentProperty extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'image_1',
        'image_2',
        'image_3',
        'image_4',
        'rent_name',
        'property_type_id',
        'landlord_id',
        'building_id',
        'forum_id',
        'floor',
        'area',
        'no_of_bed',
        'type',
        'price',
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
    public function forum()
    {
        return $this->belongsTo(Forums::class);
    }
    public function landlord()
    {
        return $this->belongsTo(User::class);
    }
}
