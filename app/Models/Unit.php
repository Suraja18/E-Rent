<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Unit extends Model
{
    use HasFactory;
    protected $fillable = [
        'image_1',
        'building_unit',
        'rooms',
        'description',
        'slug'
    ];

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
   