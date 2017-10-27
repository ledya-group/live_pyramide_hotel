<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    protected $fillable = [
        'name', 'base_price', 'description'
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
