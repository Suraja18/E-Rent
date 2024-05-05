<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friends extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'sent_id',
        'receive_id',
        'type'
    ];
    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function sentBy()
    {
        return $this->belongsTo(User::class, 'sent_id')->withTrashed();
    }
}
