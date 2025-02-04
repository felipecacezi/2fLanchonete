<?php

use Illuminate\Support\Facades\Route;
use App\Helpers\GetMainDomain;

$host = request()->getHost();
$parts = explode('.', $host);
$domain = count($parts) == 1 ? $parts[0] : $parts[1];

Route::domain($domain)->group(function () {
    Route::get('/', function () {
        return view('website.index');
    });
});



require __DIR__.'/auth.php';
