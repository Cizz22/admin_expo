<?php

namespace App\Models\Mysql;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = ['ticket_file', 'uniqueId','password','barcode','status','booking_id'];

    public function booking(){
        return $this->belongsTo(Booking::class);
    }
}
