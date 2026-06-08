<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use App\Models\Product;


class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        // Check stock availability
        if ($product->stock < $request->quantity) {
            return back()->with('error', 'Not enough stock available.');
        }

        // Reduce stock
        $product->stock -= $request->quantity;
        $product->save();

        // Save sale record
        Sale::create([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'selling_price' => $request->selling_price,
            'sale_date' => $request->sale_date,
        ]);

        return redirect()->route('sales.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        //
    }
    public function index()
    {
        $sales = Sale::with('product')->latest()->get();

        return view('sales.index', compact('sales'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
