<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demanda', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('protocolo');
            $table->string('analise');
            $table->string('n_carta');
            $table->string('n_ordem');
            $table->string('uc');
            $table->string('projeto');
            $table->integer('id_projeto');
            $table->string('nome_cliente');
            $table->string('data_entrada');
            $table->string('parecer');
            $table->string('analista');
            $table->integer('id_analista');
            $table->string('envio_carta');
            $table->string('data_parecer');
            $table->string('status_prazo');
            $table->string('email');
            $table->timestamp('create_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('demanda');
    }
}
