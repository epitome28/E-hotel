<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected  $fillable =[
        'room_id','booking_code','client_name','client_phone','arrival_time','email','hotel_name','booked_location','bookoption','checkin_date','checkout_date','duration','timing','amount_paid','payment_method','payment_status','no_people','bstatus','status'
    ];

    public function room(){
        return $this->belongsTo(Room::class,'room_id');
    }
}
