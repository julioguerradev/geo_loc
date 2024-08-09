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
            
            $table->unsignedBigInteger('uf_id')->nullable();
            $table->foreign('uf_id')->references('id')->on('ufs');
            
            $table->unsignedBigInteger('rodovia_id');
            $table->foreign('rodovia_id')->references('id')->on('rodovias');

            // $table->foreignId('uf_id')->constrained('ufs')->onDelete('cascade');
            // $table->foreignId('rodovia_id')->constrained('rodovias')->onDelete('cascade');


            $table->integer('quilometragem_inicial');
            $table->integer('quilometragem_final');  
            $table->longText('geo');                                   

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
