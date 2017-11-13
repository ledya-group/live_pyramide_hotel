<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Occupation extends Model
{
    // use SoftDeletes;

    protected $fillable = [
        'room_id', 'client_id', 'from_date', 'to_date', 'stopped_at'
    ];

    protected $dates = [
        'from_date', 'to_date', 'stopped_at', // 'created_at', 'updated_at', 'deleted_at'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }
}
