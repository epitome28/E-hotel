<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roomimage extends Model
{
    use HasFactory;
    protected $fillable = [
        'room_id','images'
    ];

    public function room(){
        return $this->belongsTo(Room::class,'room_id');
    }
}
