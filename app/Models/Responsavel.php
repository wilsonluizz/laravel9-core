<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Responsavel extends Model
{
    use SoftDeletes;
    
    protected $table = 'responsaveis';

    protected $fillable = ['nome', 'matricula', 'email'];

    public function equipamento(){
        return $this->hasMany('App\Models\Equipamento', 'responsavel_id');
    }

    public function centroDeCusto(){
        return $this->hasOne('App\Models\CentroDeCusto'. 'responsavel_id');
    }
}
