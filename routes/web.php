<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\AttachmentController;


Route::get('/', function () {
    return redirect()->route('drivers.index');
});

Route::resource('drivers', DriverController::class);

