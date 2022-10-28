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
        Schema::create('localidades', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 50);
            $table->string('cidade', 50);
            $table->integer('cep');
            $table->unsignedBigInteger('uf_id');
            $table->timestamps();
            $table->softdeletes();

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
        Schema::table('localidades', function (Blueprint $table) {
            $table->dropForeign(['uf_id']);
        });

        Schema::dropIfExists('localidades');
    }
};
