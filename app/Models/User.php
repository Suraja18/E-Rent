<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'email',
        'password',
        'image',
        'address',
        'gender',
        'roles',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = Str::title($value);
    }
    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = Str::title($value);
    }
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    protected $guarded = [];

    public function getBuildings()
    {
        return $this->hasMany(Building::class, 'landlord', 'id')->latest()->get();
    }
    public function rentProperties()
    {
        return $this->hasMany(RentProperty::class, 'landlord_id', 'id');
    }
    public function rentedProperties()
    {
        return $this->hasMany(RentedProperty::class, 'tenant_id', 'id');
    }
    public function friends()
    {
        return $this->hasMany(Friends::class, 'user_id');
    }

    public function sentFriendRequests()
    {
        return $this->hasMany(Friends::class, 'sent_id');
    }
}
