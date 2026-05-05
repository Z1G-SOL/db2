Schema::create('supply_items', function (Blueprint $table) {
    $table->id();
    $table->foreignId('supplier_id')->constrained();
    $table->foreignId('product_id')->constrained();
    $table->integer('quantity');
    $table->decimal('unit_cost',10,2);
    $table->date('delivery_date');
    $table->timestamps();
});