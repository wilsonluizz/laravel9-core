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
        Schema::create('equipamentos', function (Blueprint $table) {
            $table->id();
            $table->string('nome_equipamento', 50);
            $table->string('marca_equipamento', 50);
            $table->text('descricao_equipamento');
            $table->string('codigo_inventario_equipamento');
            $table->string('numero_de_serie_equipamento');
            $table->unsignedBigInteger('centro_de_custo_id');
            $table->unsignedBigInteger('localidade_id');
            $table->unsignedBigInteger('historico_id'); // Todo:retirar este campo.
            $table->unsignedBigInteger('responsavel_id');
            $table->unsignedBigInteger('nota_fiscal_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipamentos');
    }
};
