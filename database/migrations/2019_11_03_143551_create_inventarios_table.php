<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->year('ano');
            $table->integer('localidade');
            $table->string('portaria');
            $table->date('data_inicio');
            $table->date('data_fim');
            $table->string('criado_por');
            $table->text('obs')->nullable();
            $table->boolean('ativo')->default(TRUE); 
            $table->timestamps(); //data_criacao
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventarios');
    }
}
