Schema::create('suppliers', function (Blueprint $table) {
    $table->id();
    $table->string('supplier_name');
    $table->string('contact_person');
    $table->string('phone');
    $table->foreignId('user_id')->constrained();
    $table->timestamps();
});