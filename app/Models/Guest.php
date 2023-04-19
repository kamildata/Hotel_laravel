<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Guest extends Model
{
    use HasFactory;

    protected $fillable = [
        'imie',
        'nazwisko',
        'pesel',
        'ulica',
        'miasto',
        'nr_budynku',
        'kod_pocztowy',
        'miejscowosc',
        'kraj',
        'telefon',
        'email',
        'haslo',
    ];


  /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'haslo',
    ];

    public $timestamps = false;

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}
