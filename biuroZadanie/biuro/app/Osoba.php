<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Osoba extends Model
{
    protected $table = "osoby";
    protected $fillable = [
        'imie', 'nazwisko', 'telefon', 'email', 'opis'
    ];
}
