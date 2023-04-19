<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomReservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_id',
        'room_id'
    ];

    public $timestamps = false;

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
