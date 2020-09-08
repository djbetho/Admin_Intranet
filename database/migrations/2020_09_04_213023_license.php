<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class License extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('licencias', function (Blueprint $table) {
         $table->id()->unique();
         $table->string('rut');
         $table->string('nro_licencia',255)->nullable();
         $table->date('fecha_desde')->nullable();
         $table->date('fecha_hasta')->nullable();
         $table->integer('dias')->nullable();
         $table->string('estado',255)->nullable();
         $table->timestamps();
         $table->foreign('rut')->references('rut')->on('users');
     });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::dropIfExists('licenses');
    }
}
