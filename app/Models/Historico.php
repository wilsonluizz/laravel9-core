<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historico extends Model
{
    use HasFactory;

    public function equipamento(){
        return $this->hasOne('App\Model\Equipamento');
    }

    public function responsavel(){
        return $this->hasOne('AppZmodels\Responsavel', 'historico_id');
    }
}
