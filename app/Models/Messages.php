<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    use HasFactory;
    protected $fillable = [
        'friend_id',
        'sent_id',
        'message',
        'read_at'
    ];
    public function friend()
    {
        return $this->belongsTo(Friends::class);
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sent_by')->withTrashed();
    }
}
