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
            $table->renameColumn('centro_de_custo_id', 'id_centro_de_custo');
            $table->renameColumn('localidade_id', 'id_localidade');
            $table->renameColumn('responsavel_id', 'id_responsavel');
            $table->renameColumn('nota_fiscal_id', 'id_nota_fiscal');
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
            $table->renameColumn('id_centro_de_custo', 'centro_de_custo_id');
            $table->renameColumn('id_localidade', 'localidade_id');
            $table->renameColumn('id_responsavel', 'responsavel_id');
            $table->renameColumn('id_nota_fiscal', 'nota_fiscal_id');
        });
    }
};
