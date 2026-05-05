$table->string('first_name');
$table->string('last_name');
$table->enum('role',['cashier','manager'])->default('cashier');