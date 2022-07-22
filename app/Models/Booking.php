<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Booking extends Model
{
    protected $connection = 'mongodb';

    protected $guarded = [];

    public function ticket(){
        return $this->hasMany(Ticket::class, 'booking');
    }



}
