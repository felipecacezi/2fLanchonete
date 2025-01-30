<?php

use Illuminate\Support\Facades\Route;

Route::domain('localhost')->group(function () {
    Route::get('/', function () {
        return view('website.index');
    });
});



require __DIR__.'/auth.php';
