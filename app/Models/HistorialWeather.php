<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialWeather extends Model
{
    use HasFactory;

    protected $fillable = [
        'weather',
        'temp',
        'name',
        'country',
        'humidity',
    ];


    protected $hidden = [
        'id',
    ];

}
