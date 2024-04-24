<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class userRoles extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'user_roles',
        'roles',
        'description',
        'processes_that_pay_off',
        'image',
        'slug'
    ];
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }
}
