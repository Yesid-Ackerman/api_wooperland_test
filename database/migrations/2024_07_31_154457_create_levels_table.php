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
    {
        Schema::create('levels', function (Blueprint $table) {
            $table->id();
            $table->string('name',70);//nombre del nivel
            $table->string('description_level',200);  //descripcion del nivel
            $table->string('prize_level'); //premio del nivel
            $table->string('voice_option'); //opcion del voz del nivel
            $table->string('level');  //url del nivel
            $table->string('help_level');  //ayuda del nivel
            $table->integer('score_level');  //calificacion del nivel
            $table->unsignedBigInteger('topic_id')->nullable();  //indicador de referencia hacia la tabla temas
            $table->foreign('topic_id')->references('id')->on('topics')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('levels');
    }
};
