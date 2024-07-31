<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {         //tabla retos semanales
        Schema::create('challenges', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);  //nombre del reto
            $table->string('decription',100); //decripcion del reto semanal
            $table->string('activity',50);  //actividad del reto semanal
            $table->string('prize');  //premio del reto semanal
            $table->string('nivel');  //nivel del reto
            $table->unsignedBigInteger('children_id')->nullable();  //identificador de referencia hacia la tabla childrens
            $table->foreign('children_id')->references('id')->on('childrens')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('challenges');
    }
};
