<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'name', 'room_type_id', 'status', 'description'
    ];

    public function type()
    {
        return $this->belongsTo(RoomType::class, 'room_type_id');
    }

    public function status()
    {
        return "Aucun status disponible";
    }
}
