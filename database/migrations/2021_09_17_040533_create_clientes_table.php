<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->integer('ID_CREDITO')->unsigned();
            $table->primary('ID_CREDITO');
            $table->integer('ID_PERSONA')->nullable();
            $table->string('RFC')->nullable();
            $table->string('CURP')->nullable();
            $table->string('NOMBRE')->nullable();
            $table->string('MOROSIDAD')->nullable();
            $table->string('SEGMENTACION')->nullable();
            $table->string('ESTADO')->nullable();
            $table->string('FECHA_DE_ASIGNACION')->nullable();
            $table->string('Tel_1')->nullable();
            $table->string('Tel_2')->nullable();
            $table->string('Tel_3')->nullable();
            $table->string('Tel_4')->nullable();
            $table->string('Tel_5')->nullable();
            $table->string('EMAIL_1')->nullable();
            $table->string('EMAIL_2')->nullable();
            $table->string('EMAIL_3')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
