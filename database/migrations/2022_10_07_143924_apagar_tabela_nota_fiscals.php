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
        Schema::table('nota_fiscals', function (Blueprint $table) {
            Schema::dropIfExists('nota_fiscals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nota_fiscals', function (Blueprint $table) {
            Schema::create('nota_fiscals', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('numero_nota_fiscal');
                $table->timestamps();
            });
        });
    }
};
