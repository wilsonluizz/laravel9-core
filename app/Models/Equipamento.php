<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    use HasFactory;

    public function localidade(){
        return $this->belongsTo('App\Models\Localidade', 'id_localidade');
    }

    public function centroDeCusto(){
        return $this->belongsTo('App\Models\CentroDeCusto', 'id_centro_de_custo');
    }

    
    public function categoria(){
        return $this->belongsTo('App\Models\Categoria', 'id_categoria');
    }

    public function historico(){
        return $this->belongsTo('App\Models\Historico', 'id_historico');
    }

    public function marca(){
        return $this->belongsTo('App\Models\Marca', 'id_marca');
    }

    public function notaFiscal(){
        return $this->belongsTo('App\Model\NotaFiscal', 'id_nota_fiscal');
    }

    public function responsavel(){
        return $this->belongsTo('App\Modes\Responsavel', 'id_responsavel');
    }

}
