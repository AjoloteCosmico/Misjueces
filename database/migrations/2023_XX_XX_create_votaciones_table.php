Schema::create('votaciones', function (Blueprint $table) {
    $table->id();
    $table->foreignId('candidato_id')->constrained();
    $table->foreignId('user_id')->nullable()->constrained();
    $table->tinyInteger('puntuacion')->unsigned();
    $table->text('comentarios')->nullable();
    $table->string('ip_address', 45);
    $table->timestamps();
});
