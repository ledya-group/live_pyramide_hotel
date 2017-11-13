<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'title', 'first_name', 'last_name', 'middle_name', 'address', 'email', 'phone', 'country', 'city'
    ];
    
    public function account()
    {
        return $this->hasMany(Account::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function occupancies()
    {
        return $this->hasMany(Occupation::class);
    }

    public function fullName()
    {
        return "{$this->title} {$this->first_name} {$this->last_name}";
    }
}
