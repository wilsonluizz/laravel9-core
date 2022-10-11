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
            $table->renameColumn('nome_equipamento', 'nome');
            $table->renameColumn('descricao_equipamento', 'descricao');
            $table->renameColumn('codigo_inventario_equipamento', 'codigo_inventario');
            $table->renameColumn('numero_de_serie_equipamento', 'numero_serie');
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
            $table->renameColumn('nome', 'nome_equipamento');
            $table->renameColumn('descricao', 'descricao_equipamento');
            $table->renameColumn('codigo_inventario', 'codigo_inventario_equipamento');
            $table->renameColumn('numero_serie', 'numero_de_serie_equipamento');
        });
    }
};
