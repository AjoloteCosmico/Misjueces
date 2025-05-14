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
        Schema::create('votaciones', function (Blueprint $table) {
        $table->id();
        $table->foreignId('candidato_id')->constrained();
        $table->foreignId('user_id')->nullable()->constrained();
        $table->tinyInteger('puntuacion')->unsigned();
        $table->text('comentarios')->nullable();
        $table->string('ip_address', 45);
        $table->timestamps();
    });
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('votaciones');
    }
};
