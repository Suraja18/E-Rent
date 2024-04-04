<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Forums extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'heading',
        'description',
        'slug',
    ];
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }
    public function rentProperties()
    {
        return $this->hasMany(RentProperty::class);
    }
}
