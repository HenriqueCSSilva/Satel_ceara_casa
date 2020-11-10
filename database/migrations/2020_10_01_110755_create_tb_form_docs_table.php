<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbFormDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_form_docs', function (Blueprint $table) {
            $table->bigIncrements('id');           
            $table->string('tipo_projeto');
            $table->string('nome_cliente');
            $table->string('entrada');
            $table->string('responsavel_tec');
            $table->string('art');
            $table->string('endereco');
            $table->string('nome_arquivo');
            $table->string('protocolo');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_form_docs');
    }
}
