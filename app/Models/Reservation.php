<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'data_rozpoczecia',
        'data_zakonczenia',
        'guest_id',
        'room_id'
    ];

    public $timestamps = false;


    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }

}
