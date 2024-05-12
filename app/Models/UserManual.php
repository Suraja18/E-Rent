<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserManual extends Model
{
    use HasFactory;
    protected $fillable = [
        'role_id',
        'title',
        'description',
        'link'
    ];
    public function roleUser()
    {
        return $this->belongsTo(userRoles::class, 'role_id', 'id');
    }
}
