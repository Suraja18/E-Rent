<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class HelpCentre extends Model
{
    use HasFactory;
    protected $fillable = [
        'role_id',
        'question',
        'answer',
        'slug'
    ];
    public function setSlugAttribute($value)
    {
        $slug = Str::slug($value);
        $counter = 1;
        while (HelpCentre::where('slug', $slug)->exists()) {
            $slug = Str::slug($value) . '-' . $counter;
            $counter++;
        }

        $this->attributes['slug'] = $slug;
    }
    public function userRole()
    {
        return $this->belongsTo(UserRoles::class, 'role_id');
    }
}
