<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\SupplyItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::latest()->paginate(10);
        return view('suppliers.index', compact('suppliers'));
    }

    public function create()
    {
        return view('suppliers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'supplier_name'  => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            'phone'          => 'required|string|max:50',
        ]);

        Supplier::create([
            'supplier_name'  => $request->supplier_name,
            'contact_person' => $request->contact_person,
            'phone'          => $request->phone,
            'user_id'        => Auth::id(),
        ]);

        return redirect()->route('suppliers.index')->with('success', 'Supplier added successfully.');
    }

    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', compact('supplier'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'supplier_name'  => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            'phone'          => 'required|string|max:50',
        ]);

        $supplier->update($request->only(['supplier_name', 'contact_person', 'phone']));

        return redirect()->route('suppliers.index')->with('success', 'Supplier updated successfully.');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route('suppliers.index')->with('success', 'Supplier deleted.');
    }

    public function stockForm()
    {
        return view('stock.index', [
            'products'  => Product::all(),
            'suppliers' => Supplier::all(),
        ]);
    }

    public function stockIn(Request $request)
    {
        $request->validate([
            'product_id'    => 'required|exists:products,id',
            'supplier_id'   => 'required|exists:suppliers,id',
            'quantity'      => 'required|integer|min:1',
            'unit_cost'     => 'required|numeric|min:0',
            'delivery_date' => 'required|date',
        ]);

        SupplyItem::create($request->all());

        $product = Product::findOrFail($request->product_id);
        $product->increment('stock_qty', $request->quantity);

        return back()->with('success', 'Stock added successfully.');
    }
}