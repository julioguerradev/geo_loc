<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Techos extends Model
{
    use HasFactory;

    protected $fillable = [
        'data_referencia',
        'uf_id',
        'rodovia_id',
        'quilometragem_inicial',
        'quilometragem_final',
        'geo'
    ];


}
