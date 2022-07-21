<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Ticket extends Model
{
    protected $connection = 'mongodb';
    protected $guarded = [];

    public function booking(){
        return $this->belongsTo(Booking::class, 'booking');
    }
}
