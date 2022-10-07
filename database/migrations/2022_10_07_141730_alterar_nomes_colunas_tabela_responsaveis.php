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
        Schema::table('responsaveis', function (Blueprint $table) {
            $table->renameColumn('nome_responsavel', 'nome');
            $table->renameColumn('matricula_responsavel', 'matricula');
            $table->renameColumn('email_responsavel', 'email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('responsaveis', function (Blueprint $table) {
            $table->renameColumn( 'nome','nome_responsavel');
            $table->renameColumn('matricula', 'matricula_responsavel');
            $table->renameColumn('email','email_responsavel');
        });
    }
};
