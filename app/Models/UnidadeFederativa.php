<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadeFederativa extends Model
{
    use HasFactory;
    protected $table = 'unidades_federativas';

    public function localidade(){
        return $this->hasMany('App\Models\Localidade', 'uf_id');
    }
}
