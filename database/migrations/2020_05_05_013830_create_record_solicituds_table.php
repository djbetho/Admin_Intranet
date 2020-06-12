<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordSolicitudsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     
         Schema::create('record_solicituds', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('rut');
            $table->string('detalle')->nullable();
            $table->string('fecha_desde')->nullable();
            $table->string('fecha_hasta')->nullable();
            $table->integer('cs')->nullable();
            $table->string('reemplazo')->nullable();
            $table->integer('estado')->nullable();
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
        Schema::dropIfExists('record_solicituds');
    }
}
