<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DriverController;

Route::get('/', function () {
    return redirect()->route('drivers.index');
});

Route::resource('drivers', DriverController::class);
