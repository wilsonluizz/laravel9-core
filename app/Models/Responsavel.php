<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsavel extends Model
{
    use HasFactory;
    protected $table = 'responsaveis';

    protected $fillable = ['nome', 'matricula', 'email'];

    public function equipamento(){
        return $this->hasMany('App\Models\Equipamento', 'responsavel_id');
    }

    public function historico(){
        return $this->belongsTo('App\Models\Historico', 'responsavel_id');
    }

    public function centroDeCusto(){
        return $this->hasOne('App\Models\CentroDeCusto'. 'responsavel_id');
    }
}
