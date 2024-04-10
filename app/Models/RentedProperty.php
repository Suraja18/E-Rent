<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RentedProperty extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'tenant_id',
        'rent_id',
        'discount',
        'status',
        'active',
    ];
    public function tenant() 
    {
        return $this->belongsTo(User::class, 'tenant_id', 'id');
    }
    public function rentProperty()
    {
        return $this->belongsTo(RentProperty::class, 'rent_id', 'id');
    }
    public function payments()
    {
        return $this->hasMany(RentPayment::class, 'rented_id');
    }
}
