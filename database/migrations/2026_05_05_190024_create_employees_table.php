public function up()
{
    Schema::create('employees', function (Blueprint $table) {
        $table->id();
        $table->string('first_name');
        $table->string('last_name');
        $table->string('contact')->nullable();
        $table->enum('position', ['cashier','manager']);
        $table->string('email')->unique();
        $table->string('password');
        $table->timestamps();
    });
}