@extends('layouts.app')

@section('title', 'Edit Driver')

@section('content')
<div class="w-full mx-auto p-6 bg-white rounded-lg shadow-md">

    <h1 class="text-xl font-bold mb-4 text-green-700">Edit Driver</h1>

    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('drivers.update', $driver) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-2 gap-4 text-gray-700 text-xs">

            <!-- Username -->
            <div>
                <label class="block font-semibold mb-1">Username:</label>
                <input type="text" value="{{ $driver->user->username }}" class="w-full border p-2 rounded bg-gray-100" disabled>
            </div>

            <!-- Driver Name -->
            <div>
                <label class="block font-semibold mb-1">Driver Name:</label>
                <input type="text" name="name" value="{{ old('name', $driver->user->name) }}" class="w-full border p-2 rounded" required>
            </div>

            <!-- Driver Number -->
            <div>
                <label class="block font-semibold mb-1">Driver Number:</label>
                <input type="text" name="driver_number" value="{{ old('driver_number', $driver->driver_number) }}" class="w-full border p-2 rounded" required>
            </div>

            <!-- SFD Type -->
            <div>
                <label class="block font-semibold mb-1">SFD:</label>
                <select name="employment_type" class="w-full border p-2 rounded" required>
                    <option value="Full Time" {{ $driver->employment_type === 'Full Time' ? 'selected' : '' }}>Full Time</option>
                    <option value="Part Time" {{ $driver->employment_type === 'Part Time' ? 'selected' : '' }}>Part Time</option>
                </select>
            </div>

            <!-- Status -->
            <div>
                <label class="block font-semibold mb-1">Account Status:</label>
                <select name="status" class="w-full border p-2 rounded" required>
                    <option value="Active" {{ $driver->status === 'Active' ? 'selected' : '' }}>Active</option>
                    <option value="Inactive" {{ $driver->status === 'Inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <!-- Suspended -->
            <div>
                <label class="block font-semibold mb-1">Suspended:</label>
                <select name="is_suspended" class="w-full border p-2 rounded">
                    <option value="0" {{ !$driver->is_suspended ? 'selected' : '' }}>No</option>
                    <option value="1" {{ $driver->is_suspended ? 'selected' : '' }}>Yes</option>
                </select>
            </div>

            <!-- Ceased -->
            <div>
                <label class="block font-semibold mb-1">Ceased:</label>
                <select name="is_ceased" class="w-full border p-2 rounded">
                    <option value="0" {{ !$driver->is_ceased ? 'selected' : '' }}>No</option>
                    <option value="1" {{ $driver->is_ceased ? 'selected' : '' }}>Yes</option>
                </select>
            </div>

            <!-- ID/Iqarna -->
            <div>
                <label class="block font-semibold mb-1">ID/Iqarna:</label>
                <input type="text" name="id_iqarna" value="{{ old('id_iqarna', $driver->id_iqarna) }}" class="w-full border p-2 rounded" required>
            </div>

            <!-- ID/Iqarna Expiry -->
            <div>
                <label class="block font-semibold mb-1">ID/Iqarna Expiry Date:</label>
                <input type="date" name="id_iqarna_expiry" value="{{ old('id_iqarna_expiry', $driver->id_iqarna_expiry->format('Y-m-d')) }}" class="w-full border p-2 rounded" required>
            </div>

            <!-- Date of Birth -->
            <div>
                <label class="block font-semibold mb-1">Date of Birth:</label>
                <input type="date" name="dob" value="{{ old('dob', $driver->dob->format('Y-m-d')) }}" class="w-full border p-2 rounded" required>
            </div>

            <!-- Nationality -->
            <div>
                <label class="block font-semibold mb-1">Nationality:</label>
                <input type="text" name="nationality" value="{{ old('nationality', $driver->nationality) }}" class="w-full border p-2 rounded" required>
            </div>

            <!-- Country -->
            <div>
                <label class="block font-semibold mb-1">Country:</label>
                <input type="text" name="country" value="{{ old('country', $driver->country) }}" class="w-full border p-2 rounded" required>
            </div>

            <!-- City -->
            <div>
                <label class="block font-semibold mb-1">City:</label>
                <input type="text" name="city" value="{{ old('city', $driver->city) }}" class="w-full border p-2 rounded" required>
            </div>

            <!-- IMEI -->
            <div>
                <label class="block font-semibold mb-1">IMEI:</label>
                <input type="text" name="imei" value="{{ old('imei', $driver->imei) }}" class="w-full border p-2 rounded" required>
            </div>

            <!-- Phone -->
            <div>
                <label class="block font-semibold mb-1">Phone Number:</label>
                <input type="text" name="phone" value="{{ old('phone', $driver->user->phone) }}" class="w-full border p-2 rounded">
            </div>

            <!-- Gender -->
            <div>
                <label class="block font-semibold mb-1">Gender:</label>
                <select name="gender" class="w-full border p-2 rounded">
                    <option value="Male" {{ $driver->gender === 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ $driver->gender === 'Female' ? 'selected' : '' }}>Female</option>
                    <option value="Other" {{ $driver->gender === 'Other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>

            <!-- Note -->
            <div class="col-span-2">
                <label class="block font-semibold mb-1">Note:</label>
                <textarea name="note" class="w-full border p-2 rounded">{{ old('note', $driver->note) }}</textarea>
            </div>

            <!-- Profile Photo -->
            <div class="col-span-2">
                <label class="block font-semibold mb-1">Profile Photo:</label>
                <input type="file" name="photo_path" class="w-full">
                @if($driver->photo_path)
                <img src="{{ asset('storage/' . $driver->photo_path) }}" alt="Photo" class="w-20 h-20 mt-2 rounded-full object-cover">
                @endif
            </div>

            <!-- Password -->
            <!-- <div>
                <label class="block font-semibold mb-1">Password (leave blank to keep current):</label>
                <input type="password" name="password" class="w-full border p-2 rounded">
            </div>

            <div>
                <label class="block font-semibold mb-1">Confirm Password:</label>
                <input type="password" name="password_confirmation" class="w-full border p-2 rounded">
            </div> -->

        </div>

        <div class="mt-6 flex justify-between items-center">

            <a href="{{ route('drivers.index') }}" class="bg-red-900 text-white px-4 py-2 rounded hover:bg-gray-400">
                Cancel
            </a>

            <button type="submit" class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800">
                Update Driver
            </button>


        </div>

</div>
@endsection