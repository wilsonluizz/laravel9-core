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
        Schema::create('centro_de_custos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 50);
            $table->string('codigo', 10);
            $table->unsignedBigInteger('responsavel_id');
            $table->timestamps();
            $table->softdeletes();

            $table->foreign('responsavel_id')->references('id')->on('responsaveis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('centro_de_custos', function (Blueprint $table) {
            $table->dropConstrainedForeignId('responsavel_id');
        });
        
        Schema::dropIfExists('centro_de_custos');
    }
};
