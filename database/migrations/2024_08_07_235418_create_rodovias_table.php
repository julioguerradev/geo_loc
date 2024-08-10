<?php 

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRodoviasTable extends Migration
{
    public function up()
    {
        Schema::create('rodovias', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->string('nome');
            $table->string('estado');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rodovias');
    }
}
