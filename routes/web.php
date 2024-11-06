<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DatatableController;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {

    //menu
    Route::get('/', [MenuController::class, 'index'])->name('menu.index');
    //end menu

    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/dashboard/charts', [DashboardController::class, 'getCharts'])->name('dashboard.charts');


        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


        // category
        Route::get('/datatable/category', [DatatableController::class, 'category'])->name('datatable.category');
        Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/category/autocomplete/{word}', [CategoryController::class, 'autocomplete'])->name('category.autocomplete');
        Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
        Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');

        Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
        Route::put('/category', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('/category/{id}/destroy', [CategoryController::class, 'destroy'])->name('category.delete');
        // end category

        //product
        Route::get('/product', [ProductController::class, 'index'])->name('product.index');
        Route::get('/datatable/product', [DatatableController::class, 'product'])->name('datatable.product');
        Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
        Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');

        Route::post('/product', [ProductController::class, 'store'])->name('product.store');
        Route::put('/product', [ProductController::class, 'update'])->name('product.update');
        Route::delete('/product/{id}/destroy', [ProductController::class, 'destroy'])->name('product.delete');
        //end product

        //files
        Route::get('/file/{id}', [FileController::class, 'getCdn'])->name('file.cdn');
        Route::post('/file', [FileController::class, 'store'])->name('file.store');
        Route::delete('/file/{id}', [FileController::class, 'destroy'])->name('file.destroy');
        //end files

        // menu config
        Route::get('/menuConfig', [MenuController::class, 'edit'])->name('menuConfig.edit');
        Route::put('/menuConfig', [MenuController::class, 'update'])->name('menuConfig.update');
        // end menu config

        
    });
    // order
    Route::post('/order', [OrderController::class, 'store'])->name('order.store');
    Route::get('/order/status/{hash?}', [OrderController::class, 'show'])->name('order.show');
    // end order

});

require __DIR__.'/auth.php';
