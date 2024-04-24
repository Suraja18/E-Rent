<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'rented_id',
        'rate',
        'review'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function rentProperty()
    {
        return $this->belongsTo(RentProperty::class, 'rented_id');
    }
}
