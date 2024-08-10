<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rodovias extends Model
{
    use HasFactory;
    
    protected $table = 'rodovias';

    protected $fillable = ['codigo', 'nome'];

    public function trechos()
    {
        return $this->hasMany(Trechos::class, 'rodovia_id');
    }

    public function uf()
{
    return $this->belongsTo(Ufs::class, 'estado', 'nome');
}
}
