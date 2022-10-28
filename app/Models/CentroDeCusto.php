<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CentroDeCusto extends Model
{
    use SoftDeletes;
    protected $fillable = ['nome', 'codigo', 'responsavel_id'];


    public function equipamento(){
        return $this->hasMany('App\Models\Equipamento', 'centro_de_custo_id');
    }

    public function responsavel(){
        return $this->belongsTo('App\Models\Responsavel', 'responsavel_id');
    }
    
    

}
