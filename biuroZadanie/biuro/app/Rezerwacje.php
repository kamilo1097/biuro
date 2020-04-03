<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rezerwacje extends Model
{
    protected $table = 'rezerwacje';
    protected $fillable = [
        'kiedy_rezerwacja','osoba_id', 'miejsce_pracy_id'
    ];
}
