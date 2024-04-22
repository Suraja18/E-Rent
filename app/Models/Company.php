<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'address',
        'email',
        'phone_number',
        'logo',
        'google_map',
        'linkedin',
        'facebook',
        'instagram',
        'twitter',
        'contact_description'
    ];
}
