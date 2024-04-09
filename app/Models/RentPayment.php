<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RentPayment extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'rented_id',
        'amt_paid',
        'status',
        'payment_mode',
        'payment_type',
        'month',
        'remarks',
        'tenantVisible',
        'visible'
    ];

    public function rentedProperty()
    {
        return $this->belongsTo(RentedProperty::class, 'rented_id');
    }
}
