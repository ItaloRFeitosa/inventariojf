<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponsabilidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsabilidades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_membro');
            $table->string('cod_lotacao');
            $table->string('cod_setor');
            $table->timestamps();
            
            $table->foreign('id_membro')->references('id')->on('membros');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('responsabilidades');
    }
}
