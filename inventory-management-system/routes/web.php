<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\DashboardController;
use App\Models\Category;
use App\Models\Product;
use \App\Models\Supplier;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $totalCategories = Category::count();
    $totalProducts = Product::count();
    $totalSuppliers = Supplier::count();
    $totalStock = Product::sum('stock');
    $lowStockProducts = Product::where('stock', '<=', 5)->get();
    $inStock = Product::where('stock', '>', 5)->count();
    $lowStock = Product::whereBetween('stock', [1, 5])->count();
    $outOfStock = Product::where('stock', 0)->count();
    return view('dashboard', compact(
        'totalCategories',
        'totalProducts',
        'totalStock',
        'totalSuppliers',
        'lowStockProducts',
        'inStock',
        'lowStock',
    ));
})->middleware(['auth'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);


Route::resource('purchases', PurchaseController::class);

Route::resource('sales', SaleController::class);

Route::middleware(['auth'])->group(function () {

    Route::resource('suppliers', SupplierController::class);
});

Route::middleware(['auth', 'admin'])->group(function () {

    Route::resource('categories', CategoryController::class);
});


Route::get('/activity-logs', [ActivityLogController::class, 'index'])
    ->name('activity-logs.index');
Route::get('/sales/{sale}/invoice', [SaleController::class, 'invoice'])->name('sales.invoice');
Route::get('/dashboard/profit', [DashboardController::class, 'profit']);

require __DIR__ . '/auth.php';
