protected $fillable = ['customer_id','user_id','order_date','total_amount'];

public function items() {
    return $this->hasMany(OrderItem::class);
}