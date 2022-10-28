<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tipo extends Model
{
    use SoftDeletes;

    

    public function equipamento(){
        return $this->hasMany('App\Models\Equipamento', 'tipo_id');
    }
}
