<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrcamentosTable extends Migration
{
    /**
     * Criação do esquema da tabela de orçamentos.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orcamentos', function (Blueprint $table) {
            $table->id('chave');
            $table->string('id');
            $table->date('data');
            $table->time('hora');
            $table->string('cliente');
            $table->string('vendedor');
            $table->float('valor_orcado');
            $table->string('descricao');
        });
    }

    /**
     * Exclusão do esquema caso a tabela já exista.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orcamentos');
    }
}
