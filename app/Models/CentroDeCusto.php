<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CentroDeCusto extends Model
{
    protected $table = 'centro_de_custos';
    protected $fillable = ['nome', 'codigo', 'responsavel'];
}
