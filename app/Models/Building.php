<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
    ];

    public function landlord()
    {
        return $this->belongsTo(User::class, 'landlord', 'id');
    }
}
