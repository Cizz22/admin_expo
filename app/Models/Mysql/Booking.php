<?php

namespace App\Models\Mysql;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['name','email','whatsapp','payment_proof','payment_no','payment_method','ticket_total','ticket_type','booking_status','payment_total'];

    public function ticket(){
        return $this->hasMany(Ticket::class);
    }
}
