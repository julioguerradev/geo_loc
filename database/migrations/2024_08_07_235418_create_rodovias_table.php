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
            $table->string('codigo')->unique(); // Ex: "BR-101"
            $table->string('nome'); // Ex: "Rodovia BR-101"
        });
    }

    public function down()
    {
        Schema::dropIfExists('rodovias');
    }
}
