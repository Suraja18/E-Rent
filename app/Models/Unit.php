<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Unit extends Model
{
    use HasFactory;


    public function setBuildingUnitAttribute($value)
    {
        $this->attributes['building_unit'] = Str::title($value);
    }
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }
    public function rentProperties()
    {
        return $this->hasMany(RentProperty::class, 'property_type_id');
    }
}
   