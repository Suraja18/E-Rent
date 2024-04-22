<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PressMedia extends Model
{
    use HasFactory;
    protected $fillable = [
        'image_1',
        'heading',
        'type',
        'description',
        'slug'
    ];
    public function setSlugAttribute($value)
    {
        $slug = Str::slug($value);
        $counter = 1;
        while (PressMedia::where('slug', $slug)->exists()) {
            $slug = Str::slug($value) . '-' . $counter;
            $counter++;
        }

        $this->attributes['slug'] = $slug;
    }
}
