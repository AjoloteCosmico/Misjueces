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
        Schema::create('legals', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('contenido');  # Para HTML/WYSIWYG
            $table->string('version')->default('1.0.0');
            $table->date('fecha_publicacion');
            $table->string('archivo_path')->nullable(); # Ruta de PDFs
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('legals');
    }
};
