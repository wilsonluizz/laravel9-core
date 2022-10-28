<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoMovimentacao extends Model
{
    protected $table = 'tipo_movimentacao';

    public function movimentacao(){
        return $this->hasMany('App\Models\Movimentacao', 'tipo_mov_id');
    }
}
