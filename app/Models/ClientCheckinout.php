<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientCheckinout extends Model
{
    use HasFactory;

    protected  $fillable =[
        'room_id','client_name','client_phone','client_alt_phone','room_type','bookoption','duration','timing','amount_paid','checkin','checkout','checkedin_by','checkedout_by','no_people','time_in','time_out','time_alert','status',
        'payment_method','discount','autorized_by'
    ];

    public function room(){
        return $this->belongsTo(Room::class,'room_id');
    }
}
