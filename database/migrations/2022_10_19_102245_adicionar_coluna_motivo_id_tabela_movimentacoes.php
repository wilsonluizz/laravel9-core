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
        Schema::table('movimentacoes', function (Blueprint $table) {
            $table->dropColumn('tipo_movimentacao');
            $table->foreignId('tipo_mov_id')->references('id')->on('tipo_movimentacao');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('movimentacoes', function (Blueprint $table) {
            $table->dropForeign(['tipo_mov_id']);
            $table->string('tipo_movimentacao');
        });
    }
};