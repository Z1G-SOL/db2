<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupplyItem extends Model
{
    protected $fillable = ['supplier_id', 'product_id', 'quantity', 'unit_cost', 'delivery_date'];
}