<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use App\Models\Product;
use PDF;

class SaleController extends Controller
{

    public function create()
    {
        $products = Product::all();

        return view('sales.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id'     => 'required|exists:products,id',
            'quantity'       => 'required|integer|min:1',
            'selling_price'  => 'required|numeric|min:0',
            'sale_date'      => 'required|date',
        ]);

        $product = Product::findOrFail($request->product_id);

        // Check stock availability
        if ($product->stock < $request->quantity) {
            return back()->with('error', 'Not enough stock available.');
        }

        // Reduce stock
        $product->stock -= $request->quantity;
        $product->save();

        // Save sale record (no profit calculation here)
        Sale::create([
            'product_id'    => $request->product_id,
            'quantity'      => $request->quantity,
            'selling_price' => $request->selling_price,
            'sale_date'     => $request->sale_date,
        ]);

        return redirect()->route('sales.index');
    }

    public function index(Request $request)
    {
        $query = Sale::with('product');

        if ($request->search) {
            $query->whereHas('product', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%');
            });
        }

        $sales = $query->latest()->paginate(10);

        return view('sales.index', compact('sales'));
    }
    public function show(Sale $sale)
    {
        //
    }

    public function edit(Sale $sale)
    {
        //
    }

    public function update(Request $request, Sale $sale)
    {
        //
    }

    public function destroy(Sale $sale)
    {
        //
    }

    public function invoice(Sale $sale)
    {
        $sale->load('product');

        $pdf = PDF::loadView('sales.invoice', compact('sale'));

        return $pdf->download('invoice-' . $sale->id . '.pdf');
    }
}
