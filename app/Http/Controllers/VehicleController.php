<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Driver;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    // List all vehicles
    public function index()
    {
        $vehicles = Vehicle::with('driver', 'attachments')->get();
        $drivers = Driver::with('user')->get(); // for add vehicle dropdown
        return view('vehicles.index', compact('vehicles', 'drivers'));
    }

}
