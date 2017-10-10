<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Occupancy extends Model
{
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class)
    }
}
