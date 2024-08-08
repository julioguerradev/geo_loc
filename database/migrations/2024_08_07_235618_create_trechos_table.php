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
        Schema::create('trechos', function (Blueprint $table) {
            $table->id();

            $table->date('data_referencia');         
            $table->unsignedBigInteger('uf_id');     
            $table->unsignedBigInteger('rodovia_id');
            $table->integer('quilometragem_inicial');
            $table->integer('quilometragem_final');  
            $table->geometry('geo');                                   

            $table->timestamps();
            $table->softDeletes();
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trechos');
    }
};
