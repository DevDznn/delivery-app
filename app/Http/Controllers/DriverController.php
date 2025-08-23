<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class DriverController extends Controller
{
    // List all drivers
    public function index()
    {
        $drivers = Driver::with('user', 'vehicle.attachments')->latest()->paginate(10);
        return view('drivers.index', compact('drivers'));
    }

    // Show form to create new driver
    public function create()
    {
        return view('drivers.create');
    }

    // Generate unique username
    protected function generateUniqueUsername()
    {
        $start = 1021299100;
        do {
            $username = (string) $start;
            $start++;
        } while (User::where('username', $username)->exists());

        return $username;
    }

    // Store new driver, vehicle, and attachments
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'driver_number' => 'required|unique:drivers,driver_number|max:20',
            'employment_type' => ['required', Rule::in(['Full Time', 'Part Time'])],
            'status' => ['required', Rule::in(['Active', 'Inactive'])],
            'is_suspended' => 'required|boolean',
            'is_ceased' => 'required|boolean',
            'id_iqarna' => 'required|string|max:50',
            'iqama_issue' => 'required|date',
            'iqama_duration' => 'nullable|integer|min:0',
            'id_iqarna_expiry' => 'required|date',
            'dob' => 'required|date',
            'nationality' => 'required|string|max:50',
            'country' => 'required|string|max:50',
            'city' => 'required|string|max:50',
            'imei' => ['required', 'digits:15'],
            'gender' => ['required', Rule::in(['Male', 'Female', 'Other'])],
            'phone' => 'nullable|string|max:20',
            'note' => 'nullable|string',
            'photo_path' => 'nullable|image|max:10240',
            'password' => 'required|string|confirmed|min:8',

            'car_type' => 'required|string',
            'plate_number' => 'required|string|unique:vehicles,plate_number',
            'year_model' => 'required|digits:4',
            'brand_model' => 'required|string',
            'unit_service_type' => 'required|string',

            'attachments.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:10240',
        ]);

        try {
            $username = $this->generateUniqueUsername();
            $user = User::create([
                'name' => $validated['name'],
                'username' => $username,
                'phone' => $validated['phone'] ?? null,
                'password' => Hash::make($validated['password']),
                'role' => 'driver',
            ]);

            $photoPath = $request->hasFile('photo_path')
                ? $request->file('photo_path')->store('drivers', 'public')
                : null;

            $driver = Driver::create([
                'user_id' => $user->id,
                'driver_number' => $validated['driver_number'],
                'employment_type' => $validated['employment_type'],
                'status' => $validated['status'],
                'is_suspended' => $validated['is_suspended'],
                'is_ceased' => $validated['is_ceased'],
                'id_iqarna' => $validated['id_iqarna'],
                'iqama_issue' => $validated['iqama_issue'],
                'iqama_duration' => $validated['iqama_duration'],
                'id_iqarna_expiry' => $validated['id_iqarna_expiry'],
                'dob' => $validated['dob'],
                'nationality' => $validated['nationality'],
                'country' => $validated['country'],
                'city' => $validated['city'],
                'imei' => $validated['imei'],
                'gender' => $validated['gender'],
                'note' => $validated['note'] ?? null,
                'photo_path' => $photoPath,
            ]);

            $vehicle = Vehicle::create([
                'driver_id' => $driver->id,
                'car_type' => $validated['car_type'],
                'plate_number' => $validated['plate_number'],
                'year_model' => $validated['year_model'],
                'brand_model' => $validated['brand_model'],
                'unit_service_type' => $validated['unit_service_type'],
            ]);

            if ($request->hasFile('attachments')) {
                foreach ($request->file('attachments') as $type => $file) {
                    if ($file) {
                        $filePath = $file->store('drivers/attachments', 'public');
                        Attachment::create([
                            'vehicle_id' => $vehicle->id,
                            'attachment_type' => $type,
                            'file_path' => $filePath,
                        ]);
                    }
                }
            }

            return redirect()->route('drivers.index')
                ->with('success', "Driver and Vehicle created successfully. Username: $username");
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    // Show edit form
    public function edit(Driver $driver)
    {
        $driver->load('user', 'vehicle.attachments');
        return view('drivers.edit', compact('driver'));
    }

    // Update driver, vehicle, attachments
    public function update(Request $request, Driver $driver)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'driver_number' => 'required|string|max:255',
            'employment_type' => 'required|string',
            'status' => 'required|string',
            'is_suspended' => 'nullable|boolean',
            'is_ceased' => 'nullable|boolean',
            'id_iqarna' => 'required|string|max:255',
            'id_iqarna_expiry' => 'required|date',
            'iqama_issue' => 'nullable|date',
            'iqama_duration' => 'nullable|integer',
            'dob' => 'required|date',
            'nationality' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'imei' => 'nullable|string|max:255',
            'gender' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
            'note' => 'nullable|string',
            'photo_path' => 'nullable|image|max:10240',
            // Vehicle
            'car_type' => 'nullable|string|max:255',
            'plate_number' => 'nullable|string|max:255',
            'year_model' => 'nullable|digits:4',
            'brand_model' => 'nullable|string|max:255',
            'unit_service_type' => 'nullable|string|max:255',
            // Attachments
            'attachments.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:10240',
        ]);

        // Update user
        $driver->user->update([
            'name' => $request->name,
            'phone' => $request->phone,
        ]);

        // Update driver
        $driver->update([
            'driver_number' => $request->driver_number,
            'employment_type' => $request->employment_type,
            'status' => $request->status,
            'is_suspended' => $request->is_suspended ?? 0,
            'is_ceased' => $request->is_ceased ?? 0,
            'id_iqarna' => $request->id_iqarna,
            'id_iqarna_expiry' => $request->id_iqarna_expiry,
            'iqama_issue' => $request->iqama_issue,
            'iqama_duration' => $request->iqama_duration,
            'dob' => $request->dob,
            'nationality' => $request->nationality,
            'country' => $request->country,
            'city' => $request->city,
            'imei' => $request->imei,
            'gender' => $request->gender,
            'note' => $request->note,
        ]);

        // Profile photo
        if ($request->hasFile('photo_path')) {
            if ($driver->photo_path) {
                Storage::disk('public')->delete($driver->photo_path);
            }
            $driver->update([
                'photo_path' => $request->file('photo_path')->store('drivers', 'public')
            ]);
        }

        // Update or create vehicle
        $vehicleData = $request->only([
            'car_type',
            'plate_number',
            'year_model',
            'brand_model',
            'unit_service_type'
        ]);

        if ($driver->vehicle) {
            $driver->vehicle->update($vehicleData);
        } elseif (!empty(array_filter($vehicleData))) {
            $driver->vehicle()->create($vehicleData);
        }

        // Update or create attachments
        if ($request->hasFile('attachments') && $driver->vehicle) {
            foreach ($request->file('attachments') as $type => $file) {
                if ($file) {
                    $path = $file->store('drivers/attachments', 'public');

                    $attachment = $driver->vehicle->attachments()->where('attachment_type', $type)->first();

                    if ($attachment) {
                        // delete old file
                        Storage::disk('public')->delete($attachment->file_path);
                        $attachment->update(['file_path' => $path]);
                    } else {
                        $driver->vehicle->attachments()->create([
                            'attachment_type' => $type,
                            'file_path' => $path,
                        ]);
                    }
                }
            }
        }

        return redirect()->route('drivers.index', $driver)->with('success', 'Driver updated successfully!');
    }

    // Delete driver
    public function destroy(Driver $driver)
    {
        if ($driver->vehicle) {
            $vehicle = $driver->vehicle;

            foreach ($vehicle->attachments as $attachment) {
                if (Storage::disk('public')->exists($attachment->file_path)) {
                    Storage::disk('public')->delete($attachment->file_path);
                }
                $attachment->delete();
            }

            $vehicle->delete();
        }

        if ($driver->photo_path && Storage::disk('public')->exists($driver->photo_path)) {
            Storage::disk('public')->delete($driver->photo_path);
        }

        $driver->user()->delete();

        $driver->delete();

        return redirect()->route('drivers.index')->with('success', 'Driver and related vehicle & attachments deleted successfully.');
    }


    public function show(Driver $driver)
    {
        $driver->load('user', 'vehicle.attachments');
        return view('drivers.show', compact('driver'));
    }
}
