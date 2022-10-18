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
        Schema::table('historicos', function (Blueprint $table) {
            $table->foreign('equipamento_id')->references('id')->on('equipamentos');
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
        Schema::table('historicos', function (Blueprint $table) {
            $table->dropConstrainedForeignId(['equipamento_id']);
            $table->dropConstrainedForeignId(['responsavel_id']);
        });
    }
};
