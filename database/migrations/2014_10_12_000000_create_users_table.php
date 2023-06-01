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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');;
            $table->string('name');
            $table->string('email')->unique();
            $table->date('date')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->string('address')->nullable();
            $table->string('cedula')->nullable();
            $table->string('modality')->nullable();
            $table->string('phone')->nullable();
            $table->string('gender')->nullable();
            $table->string('role')->default('estudiante');

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
