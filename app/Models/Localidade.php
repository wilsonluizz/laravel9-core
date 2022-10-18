<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localidade extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'cidade', 'uf_id', 'cep'];

    public function equipamentos(){
        return $this->hasMany('App\Models\Equipamento', 'localidade_id');
    }

    public function uf(){
        return $this->belongsTo('App\Models\UnidadeFederativa', 'uf_id');
    }
}
