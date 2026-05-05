Schema::create('orders', function (Blueprint $table) {
    $table->id();
    $table->foreignId('customer_id')->constrained()->cascadeOnDelete();
    $table->foreignId('user_id')->constrained()->cascadeOnDelete();
    $table->dateTime('order_date');
    $table->decimal('total_amount',10,2)->default(0);
    $table->enum('shipment_status',['pending','shipped','delivered'])->default('pending');
    $table->timestamps();
});