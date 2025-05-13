Schema::create('candidatos', function (Blueprint $table) {
    $table->id();
    $table->string('nombre');
    $table->string('partido')->nullable();
    $table->text('bio')->nullable();
    $table->timestamps();
});
