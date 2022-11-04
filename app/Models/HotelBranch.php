<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelBranch extends Model
{
    use HasFactory;
    protected $fillable =[
        'hotel_name','hotel_slug','location','address','image'
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
