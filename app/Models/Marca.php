<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;

    public function equipamento(){
        return $this->hasMany('App\Models\Equipamento', 'id_marca');
    }
}
