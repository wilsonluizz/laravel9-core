<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsavel extends Model
{
    use HasFactory;
    protected $table = 'responsaveis';

    public function equipamento(){
        return $this->belongsTo('App\Models\Equipamento', 'id_responsavel');
    }

    public function historico(){
        return $this->belongsTo('App\Models\Historico', 'id_responsavel');
    }
}
