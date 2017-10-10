<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'username', 'password', 'owner_type', 'owner_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function owner()
    {
        return $this->morphTo();
    }
}
