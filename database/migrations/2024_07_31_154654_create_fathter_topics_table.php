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
    {    //padre temas
        Schema::create('fathter_topics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('father_id')->nullable();  //indicador de referenci hacia la tabla padres
            $table->unsignedBigInteger('topic_id')->nullable();  //indicador de referencia hacia la tabla temas
            $table->foreign('father_id')->references('id')->on('fathers')->onDelete('cascade');
            $table->foreign('topic_id')->references('id')->on('topics')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fathter_topics');
    }
};
