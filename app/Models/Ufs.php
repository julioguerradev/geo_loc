<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ufs extends Model
{
    protected $table = 'ufs';

    protected $fillable = ['sigla', 'nome'];

    public function trechos()
    {
        return $this->hasMany(Trechos::class, 'rodovia_id');
    }

    public function rodovias()
    {
        return $this->hasMany(Rodovias::class, 'estado', 'nome');
    }
}
