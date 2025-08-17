<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class DriverController extends Controller
{
   
    public function index()
    {
        $drivers = Driver::with('user')->latest()->paginate(10);
        return view('drivers.index', compact('drivers'));
    }

    /**
     * Show the form for creating a new driver.
     */
    public function create()
    {
        return view('drivers.create');
    }

    /**
     * Generate a unique username for the driver.
     */
    protected function generateUniqueUsername()
    {
        $start = 1021299100;
        do {
            $username = (string) $start;
            $start++;
        } while (User::where('username', $username)->exists());

        return $username;
    }

    /**
     * Store a newly created driver in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'driver_number' => ['required', 'unique:drivers,driver_number', 'max:20'],
            'employment_type' => ['required', Rule::in(['Full Time', 'Part Time'])],
            'status' => ['required', Rule::in(['Active', 'Inactive'])],
            'is_suspended' => 'required|boolean',
            'is_ceased' => 'required|boolean',
            'id_iqarna' => 'required|string|max:50',
            'id_iqarna_expiry' => 'required|date',
            'dob' => 'required|date',
            'nationality' => 'required|string|max:50',
            'country' => 'required|string|max:50',
            'city' => 'required|string|max:50',
            'imei' => ['required', 'digits:15'],
            'gender' => ['required', Rule::in(['Male', 'Female', 'Other'])],
            'phone' => 'nullable|string|max:20',
            'note' => 'nullable|string',
            'photo_path' => 'nullable|image|max:2048',
            'password' => 'required|string|confirmed|min:8',
        ]);

        try {
            // Auto-generate unique username
            $username = $this->generateUniqueUsername();

            // Create User
            $user = User::create([
                'name' => $validated['name'],
                'username' => $username,
                'phone' => $validated['phone'] ?? null,
                'password' => Hash::make($validated['password']),
                'role' => 'driver',
            ]);

            // Handle photo upload
            $photoPath = $request->hasFile('photo_path') 
                ? $request->file('photo_path')->store('drivers', 'public') 
                : null;

            // Create Driver profile
            Driver::create([
                'user_id' => $user->id,
                'driver_number' => $validated['driver_number'],
                'employment_type' => $validated['employment_type'],
                'status' => $validated['status'],
                'is_suspended' => $validated['is_suspended'],
                'is_ceased' => $validated['is_ceased'],
                'id_iqarna' => $validated['id_iqarna'],
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

            return redirect()->route('drivers.index')
                ->with('success', "Driver created successfully. Username: $username");
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified driver.
     */
    public function edit(Driver $driver)
    {
        return view('drivers.edit', compact('driver'));
    }

    /**
     * Update the specified driver in storage.
     */
    public function update(Request $request, Driver $driver)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'driver_number' => ['required', Rule::unique('drivers', 'driver_number')->ignore($driver->id)],
            'employment_type' => ['required', Rule::in(['Full Time', 'Part Time'])],
            'status' => ['required', Rule::in(['Active', 'Inactive'])],
            'is_suspended' => 'required|boolean',
            'is_ceased' => 'required|boolean',
            'id_iqarna' => 'required|string|max:50',
            'id_iqarna_expiry' => 'required|date',
            'dob' => 'required|date',
            'nationality' => 'required|string|max:50',
            'country' => 'required|string|max:50',
            'city' => 'required|string|max:50',
            'imei' => ['required', 'digits:15'],
            'gender' => ['required', Rule::in(['Male', 'Female', 'Other'])],
            'phone' => 'nullable|string|max:20',
            'note' => 'nullable|string',
            'photo_path' => 'nullable|image|max:2048',
            'password' => 'nullable|string|confirmed|min:8',
        ]);

        // Update User
        $user = $driver->user;
        $user->update([
            'name' => $request->name,
            'phone' => $request->phone ?? $user->phone,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        // Update Driver
        if ($request->hasFile('photo_path')) {
            $driver->photo_path = $request->file('photo_path')->store('drivers', 'public');
        }

        $driver->update([
            'driver_number' => $request->driver_number,
            'employment_type' => $request->employment_type,
            'status' => $request->status,
            'is_suspended' => $request->is_suspended,
            'is_ceased' => $request->is_ceased,
            'id_iqarna' => $request->id_iqarna,
            'id_iqarna_expiry' => $request->id_iqarna_expiry,
            'dob' => $request->dob,
            'nationality' => $request->nationality,
            'country' => $request->country,
            'city' => $request->city,
            'imei' => $request->imei,
            'gender' => $request->gender,
            'note' => $request->note,
        ]);

        return redirect()->route('drivers.index')->with('success', 'Driver updated successfully.');
    }

    /**
     * Remove the specified driver from storage.
     */
    public function destroy(Driver $driver)
    {
        $driver->user()->delete();
        $driver->delete();

        return redirect()->route('drivers.index')->with('success', 'Driver deleted successfully.');
    }

    /**
     * Display the specified driver.
     */
    public function show(Driver $driver)
    {
        return view('drivers.show', compact('driver'));
    }
    
}
