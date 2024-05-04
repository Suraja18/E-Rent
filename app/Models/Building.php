<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Building extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'image_1',
        'image_2',
        'image_3',
        'image_4',
        'name',
        'phoneNumber',
        'no_of_floors',
        'address',
        'landlord',
        'description',
        'room_per_floor',
        'google_maps_link',
        'status',
        'slug',
    ];

    public function landlords()
    {
        return $this->belongsTo(User::class, 'landlord', 'id');
    }
    public function rentProperties()
    {
        return $this->hasMany(RentProperty::class, 'building_id');
    }
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }
}
