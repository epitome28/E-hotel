<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Duration extends Model
{
    use HasFactory;
    protected  $fillable =[
        'room_id','hour','price'
    ];

    public function room(){
        return $this->belongsTo(Room::class,'room_id');
    }
}
