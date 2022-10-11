<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::table('notas_fiscais', function (Blueprint $table) {
            $table->string('sc_origem')->after('numero');
            $table->string('nome_fornecedor');
            $table->double('valor', 8, 2);
            $table->dateTime('data_emissao')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notas_fiscais', function (Blueprint $table) {
            $table->dropColumn('sc_origem');
            $table->dropColumn('nome_fornecedor');
            $table->dropColumn('valor');
            $table->dropColumn('data_emissao');
        });
    }
};
