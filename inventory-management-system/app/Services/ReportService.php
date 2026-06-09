<?php

namespace App\Services;

use App\Models\Sale;

class ReportService
{
    public function profit($storeId)
    {
        return Sale::where('store_id', $storeId)
            ->with('product')
            ->get()
            ->sum(function ($sale) {
                return ($sale->selling_price - $sale->product->purchase_price) * $sale->quantity;
            });
    }

    public function revenue($storeId)
    {
        return Sale::where('store_id', $storeId)
            ->sum('total');
    }

    public function cost($storeId)
    {
        return Sale::where('store_id', $storeId)
            ->with('product')
            ->get()
            ->sum(function ($sale) {
                return $sale->product->purchase_price * $sale->quantity;
            });
    }
}
