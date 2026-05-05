<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $orders   = Order::latest()->take(5)->get();

        return view('dashboard', compact('products', 'orders'));
    }
}