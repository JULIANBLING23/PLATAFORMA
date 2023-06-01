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
        Schema::create('user_examenes', function (Blueprint $table) {
            $table->bigIncrements('id');
            //Estudiante
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            //Materia
            $table->unsignedBigInteger('examenes_id');
            $table->foreign('examenes_id')->references('id')->on('examenes')->onDelete('cascade');
            
            $table->unsignedBigInteger('nota');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_examenes');
    }
};
