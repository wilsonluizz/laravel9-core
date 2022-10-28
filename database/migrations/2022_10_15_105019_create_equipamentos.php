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
            $table->unsignedBigInteger('responsavel_id');
            $table->unsignedBigInteger('marca_id');
            $table->unsignedBigInteger('nota_fiscal_id');
            $table->timestamps();
            $table->softdeletes();
            
            $table->foreign('centro_de_custo_id')->references('id')->on('centro_de_custos');
            $table->foreign('localidade_id')->references('id')->on('localidades');
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreign('tipo_id')->references('id')->on('tipos');
            $table->foreign('marca_id')->references('id')->on('marcas');
            $table->foreign('responsavel_id')->references('id')->on('responsaveis');
            $table->foreign('nota_fiscal_id')->references('id')->on('notas_fiscais');
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
            $table->dropForeign(['centro_de_custo_id']);
            $table->dropForeign(['localidade_id']);
            $table->dropForeign(['categoria_id']);
            $table->dropForeign(['tipo_id']);
            $table->dropForeign(['marca_id']);
            $table->dropForeign(['responsavel_id']);
            $table->dropForeign(['nota_fiscal_id']);
        });
        
        Schema::dropIfExists('equipamentos');
    }
};
