<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\StatisticsController;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $totalProducts = Product::count();
    $monthlySales = Sale::whereMonth('created_at', now()->month)->count();
    $lowStockProducts = Product::where('stock_quantity', '<', 10)->count();
    $lowStockItems = Product::where('stock_quantity', '<', 10)->limit(5)->get();
    $totalRevenue = Sale::whereMonth('created_at', now()->month)->sum('total_amount');
    
    return view('dashboard', compact('totalProducts', 'monthlySales', 'lowStockProducts', 'lowStockItems', 'totalRevenue'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('sales', SaleController::class);
    Route::get('/sales/{sale}/pdf', [PdfController::class, 'invoice'])->name('sales.pdf');
    Route::get('/statistics', [StatisticsController::class, 'index'])->name('statistics.index');
    Route::get('/low-stock', function () {
        $lowStockProducts = Product::where('stock_quantity', '<', 10)
            ->with('category')
            ->orderBy('stock_quantity', 'asc')
            ->get();
        return view('products.low-stock', compact('lowStockProducts'));
    })->name('products.low-stock');
});

require __DIR__.'/auth.php';
