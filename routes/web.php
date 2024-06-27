<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DatatableController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


        // category
        Route::get('/datatable/category', [DatatableController::class, 'category'])->name('datatable.category');
        Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');        
        Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');

        Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
        Route::put('/category', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('/category/{id}/destroy', [CategoryController::class, 'destroy'])->name('category.delete');        
        // end category
    });

});

Route::get('/ping', function(){
    return 'pong';
})->name('ping');

require __DIR__.'/auth.php';
