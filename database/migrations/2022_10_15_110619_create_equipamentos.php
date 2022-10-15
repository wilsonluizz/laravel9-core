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
            $table->string('nome', 50);
            $table->string('modelo', 50);
            $table->string('numero_serie');
            $table->string('patrimonio')->nullable();
            $table->text('descricao');
            $table->unsignedBigInteger('centro_de_custo_id');
            $table->unsignedBigInteger('localidade_id');
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('tipo_id');
            $table->unsignedBigInteger('marca_id');
            $table->unsignedBigInteger('nota_fiscal_id');
            $table->unsignedBigInteger('historico_id');
            $table->unsignedBigInteger('uf_id');
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
