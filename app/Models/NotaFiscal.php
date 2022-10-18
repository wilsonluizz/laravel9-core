<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaFiscal extends Model
{
    use HasFactory;
    protected $table = 'notas_fiscais';

    public function equipamento(){
        return $this->belongsTo('App\Models\Equipamento', 'nota_fiscal_id');
    }

    protected $dates = ['data_emissao'];
}
