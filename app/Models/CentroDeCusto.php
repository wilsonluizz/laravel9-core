<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CentroDeCusto extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'codigo', 'responsavel'];


    public function equipamento(){
        return $this->belongsTo('App\Models\Equipamento', 'id_centro_de_custo');
    }
    
    

}
