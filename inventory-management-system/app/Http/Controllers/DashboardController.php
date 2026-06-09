<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function profit()
    {
        // DAILY PROFIT (today)
        $dailyProfit = Sale::with('product')
            ->whereDate('created_at', Carbon::today())
            ->get()
            ->sum(function ($sale) {
                return ($sale->selling_price - $sale->product->purchase_price)
                    * $sale->quantity;
            });

        // MONTHLY PROFIT (current month)
        $monthlyProfit = Sale::with('product')
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->get()
            ->sum(function ($sale) {
                return ($sale->selling_price - $sale->product->purchase_price)
                    * $sale->quantity;
            });

        // TOTAL PROFIT (all time)
        $totalProfit = Sale::with('product')
            ->get()
            ->sum(function ($sale) {
                return ($sale->selling_price - $sale->product->purchase_price)
                    * $sale->quantity;
            });

        return view('dashboard.profit', compact(
            'dailyProfit',
            'monthlyProfit',
            'totalProfit'
        ));

        $dailyChart = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i);

            $sales = Sale::with('product')
                ->whereDate('created_at', $date)
                ->get();

            $profit = $sales->sum(function ($sale) {
                return ($sale->selling_price - $sale->product->purchase_price)
                    * $sale->quantity;
            });

            $dailyChart[] = [
                'date' => $date->format('d M'),
                'profit' => $profit
            ];
            return view('dashboard.profit', compact(
                'dailyProfit',
                'monthlyProfit',
                'totalProfit',
                'dailyChart'
            ));
        }
    }
}
