<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLivros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('edicao');
            $table->string('editora');
            $table->string('quantidade');
            $table->string('preco');
            $table->string('documento');
            $table->string('foto');

            $table->integer('autor_id')->unsigned();
            $table->foreign('autor_id')->references('id')->on('autores')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->integer('area_id')->unsigned();
            $table->foreign('area_id')->references('id')->on('areas')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('livros');
    }
}
