<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CentroDeCusto extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'codigo', 'responsavel_id'];


    public function equipamento(){
        return $this->belongsTo('App\Models\Equipamento', 'centro_de_custo_id');
    }

    public function responsavel(){
        return $this->belongsTo('App\Models\Responsavel', 'responsavel_id');
    }
    
    

}
