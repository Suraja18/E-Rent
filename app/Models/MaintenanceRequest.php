<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'rented_id',
        'date',
        'time1',
        'time2',
        'image',
        'video',
        'piority',
        'status',
        'tenantVisible',
        'landlordVisible'
    ];
    public function rentedProperty()
    {
        return $this->belongsTo(RentedProperty::class, 'rented_id');
    }

}
