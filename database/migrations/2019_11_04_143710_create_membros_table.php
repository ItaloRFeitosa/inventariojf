<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_inventario');
            $table->string('nu_matr_servidor');
            $table->enum('flag_adm',['0','1'])->default('0');
            $table->timestamps();
            
            $table->foreign('id_inventario')->references('id')->on('inventarios');
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('membros');
    }
}
