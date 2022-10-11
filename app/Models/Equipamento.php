<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    protected $fillable = ['nome', 'descricao', 'id_marca', 'modelo',
    'numero_serie', 'id_centro_de_custo', 'id_localidade', 'id_responsavel', 
    'id_nota_fiscal', 'id_categoria'];
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
        return $this->belongsTo('App\Models\NotaFiscal', 'id_nota_fiscal');
    }

    public function responsavel(){

        return $this->belongsTo('App\Models\Responsavel', 'id_responsavel');

    }

}
