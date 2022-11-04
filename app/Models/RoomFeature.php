<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomFeature extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id','icon','icon_name'
    ];

    public function room(){
        return $this->belongsTo(Room::class,'room_id');
    }
}
