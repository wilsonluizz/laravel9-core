<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    protected $fillable = ['nome', 'descricao', 'marca_id', 'modelo',
    'numero_serie', 'centro_de_custo_id', 'localidade_id', 'responsavel_id', 
    'nota_fiscal_id', 'categoria_id', 'tipo_id', 'patrimonio'];
    use HasFactory;

    public function localidade(){
        return $this->belongsTo('App\Models\Localidade', 'localidade_id');
    }

    public function centroDeCusto(){
        return $this->belongsTo('App\Models\CentroDeCusto', 'centro_de_custo_id');
    }

    
    public function categoria(){
        return $this->belongsTo('App\Models\Categoria', 'categoria_id');
    }

    public function historico(){
        return $this->belongsTo('App\Models\Historico', 'historico_id');
    }

    public function marca(){
        return $this->belongsTo('App\Models\Marca', 'marca_id');
    }

    public function notaFiscal(){
        return $this->belongsTo('App\Models\NotaFiscal', 'nota_fiscal_id');
    }

    public function responsavel(){

        return $this->belongsTo('App\Models\Responsavel', 'responsavel_id');

    }

    public function tipo(){
        return $this->belongsTo('App\Models\Tipo', 'tipo_id');
    }

}
