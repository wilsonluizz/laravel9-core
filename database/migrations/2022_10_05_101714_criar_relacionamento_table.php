<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('equipamentos', function (Blueprint $table) {
            
            $table->foreign('localidade_id')->references('id')->on('localidades');
            $table->foreign('centro_de_custo_id')->references('id')->on('centro_de_custos');
            $table->foreign('historico_id')->references('id')->on('historicos');
            $table->foreign('responsavel_id')->references('id')->on('responsaveis');
            $table->foreign('nota_fiscal_id',)->references('id')->on('notas_fiscais');

            $table->unique('codigo_inventario_equipamento');
            $table->unique('numero_de_serie_equipamento');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('equipamentos', function (Blueprint $table) {
            $table->dropForeign(['localidade_id']);
            $table->dropForeign(['centro_de_custo_id']);
            $table->dropForeign(['historico_id']);
            $table->dropForeign(['responsavel_id']);
            $table->dropForeign(['nota_fiscal_id']);

            $table->dropUnique(['codigo_inventario_equipamento']);
            $table->dropUnique(['numero_de_serie_equipamento']);
        });
    }
};
