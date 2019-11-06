<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coletas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_membro');
            $table->string('nu_tombo');
            $table->string('cod_lotacao');
            $table->string('cod_setor');
            $table->enum('estado_fisico',['1','2'])->nullable();
            $table->enum('flag_inconsistencia', ['0','1','2','3'])->default(0);
            $table->text('obs')->nullable();
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
        Schema::dropIfExists('coletas');
    }
}
