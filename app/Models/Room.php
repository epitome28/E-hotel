<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable=[
        'hotel_branches_id','room_name','room_slug','room_type','room_capacity','room_description','bookoption','state','city','status'
    ];

    public function hotelbranch(){
        return $this->belongsTo(HotelBranch::class,'hotel_branches_id');
    }

    public function roomimages(){
        return $this->hasMany(Roomimage::class);
    }
    public function roomdurations(){
        return $this->hasMany(Duration::class);
    }
    public function roomfeatures(){
        return $this->hasMany(RoomFeature::class);
    }

    public function checkins(){
        return $this->hasMany(ClientCheckinout::class);
    }

    public function bookings(){
        return $this->hasMany(Booking::class);
    }
}
