<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDespesasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('despesas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('despesas_id')->unsigned();
            $table->text('descricao'); //descrição
            $table->date('data')->nullable();
            $table->string('arquivoImg'); //Nome da imagem
            $table->float('valor',8,2); //valor
            $table->timestamps(); //Data

            $table->foreign('despesas_id')->references('id')->on('model_users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('despesas');
    }
}
