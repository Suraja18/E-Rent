<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UseCases extends Model
{
    use HasFactory;
    protected $fillable = [
        'role_id',
        'heading',
        'description',
    ];
    public function userRole()
    {
        return $this->belongsTo(UserRoles::class, 'role_id');
    }
}
