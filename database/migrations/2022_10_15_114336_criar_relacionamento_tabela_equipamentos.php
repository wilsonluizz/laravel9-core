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
            $table->foreign('centro_de_custo_id')->references('id')->on('centro_de_custos');
            $table->foreign('localidade_id')->references('id')->on('localidades');
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreign('tipo_id')->references('id')->on('tipos');
            $table->foreign('marca_id')->references('id')->on('marcas');
            $table->foreign('nota_fiscal_id')->references('id')->on('notas_fiscais');
            $table->foreign('historico_id')->references('id')->on('historicos');
            $table->foreign('uf_id')->references('id')->on('unidades_federativas');
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
            $table->dropConstrainedForeignId('centro_de_custo_id');
            $table->dropConstrainedForeignId('localidade_id');
            $table->dropConstrainedForeignId('categoria_id');
            $table->dropConstrainedForeignId('tipo_id');
            $table->dropConstrainedForeignId('marca_id');
            $table->dropConstrainedForeignId('nota_fiscal_id');
            $table->dropConstrainedForeignId('historico_id');
            $table->dropConstrainedForeignId('uf_id');
        });
    }
};
