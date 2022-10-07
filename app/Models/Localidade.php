<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localidade extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'cidade', 'uf'];

    public function equipamentos(){
        return $this->hasMany('App\Models\Equipamento', 'id_localidade');
    }
}
