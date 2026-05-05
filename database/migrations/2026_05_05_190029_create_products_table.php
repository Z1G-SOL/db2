Schema::create('products', function (Blueprint $table) {
    $table->id();
    $table->string('product_name');
    $table->string('category');
    $table->decimal('price',10,2);
    $table->integer('stock_qty')->default(0);
    $table->timestamps();
});