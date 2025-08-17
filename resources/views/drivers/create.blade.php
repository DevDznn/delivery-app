@extends('layouts.app')

@section('title', 'Add Driver')

@section('content')

<div class="w-full mx-auto p-6 bg-white rounded-lg shadow-md">

    <h1 class="text-xl font-bold mb-6 text-green-700">Add Driver</h1>

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

    <form action="{{ route('drivers.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div class="grid grid-cols-2 gap-4 text-gray-700 text-xs">

            <!-- Username -->
            <div>
                <label class="block font-semibold mb-1">Username:</label>
                <div class="border rounded-md p-2 bg-gray-50 text-gray-500">Automated by System</div>
            </div>

            <!-- Driver Name -->
            <div>
                <label class="block font-semibold mb-1">Driver Name:</label>
                <input type="text" name="name" class="w-full border rounded-md p-2 text-sm" required>
            </div>

            <!-- Driver Number -->
            <div>
                <label class="block font-semibold mb-1">Driver Number:</label>
                <input type="text" name="driver_number" class="w-full border rounded-md p-2 text-sm" required>
            </div>

            <!-- Employment Type -->
            <div>
                <label class="block font-semibold mb-1">SFD:</label>
                <select name="employment_type" class="w-full border rounded-md p-2 text-sm" required>
                    <option value="Full Time">Full Time</option>
                    <option value="Part Time">Part Time</option>
                </select>
            </div>

            <!-- Status -->
            <div>
                <label class="block font-semibold mb-1">Account Satatus:</label>
                <select name="status" class="w-full border rounded-md p-2 text-sm" required>
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
            </div>

            <!-- Suspended -->
            <div>
                <label class="block font-semibold mb-1">Suspended:</label>
                <select name="is_suspended" class="w-full border rounded-md p-2 text-sm">
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select>
            </div>

            <!-- Ceased -->
            <div>
                <label class="block font-semibold mb-1">Ceased:</label>
                <select name="is_ceased" class="w-full border rounded-md p-2 text-sm">
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select>
            </div>

            <!-- ID/Iqarna -->
            <div>
                <label class="block font-semibold mb-1">ID/Iqarna:</label>
                <input type="text" name="id_iqarna" class="w-full border rounded-md p-2 text-sm" required>
            </div>

            <!-- ID/Iqarna Expiry -->
            <div>
                <label class="block font-semibold mb-1">ID/Iqarna Expiry Date:</label>
                <input type="date" name="id_iqarna_expiry" class="w-full border rounded-md p-2  text-sm" required>
            </div>

            <!-- Date of Birth -->
            <div>
                <label class="block font-semibold mb-1">Date of Birth:</label>
                <input type="date" name="dob" class="w-full border rounded-md p-2 text-sm" required>
            </div>

            <!-- Nationality -->
            <div>
                <label class="block font-semibold mb-1">Nationality:</label>
                <input type="text" name="nationality" class="w-full border rounded-md p-2 text-sm" required>
            </div>

            <!-- Country -->
            <div>
                <label class="block font-semibold mb-1">Country:</label>
                <input type="text" name="country" class="w-full border rounded-md p-2  text-sm" required>
            </div>

            <!-- City -->
            <div>
                <label class="block font-semibold mb-1">City:</label>
                <input type="text" name="city" class="w-full border rounded-md p-2 text-sm" required>
            </div>

            <!-- IMEI -->
            <div>
                <label class="block font-semibold mb-1">IMEI:</label>
                <input type="text" name="imei" class="w-full border rounded-md p-2 text-sm" required>
            </div>

            <!-- Phone -->
            <div>
                <label class="block font-semibold mb-1">Phone Number:</label>
                <input type="text" name="phone" class="w-full border rounded-md p-2 text-sm">
            </div>

            <!-- Gender -->
            <div>
                <label class="block font-semibold mb-1">Gender:</label>
                <select name="gender" class="w-full border rounded-md p-2 text-sm">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <!-- Note -->
            <div class="col-span-2">
                <label class="block font-semibold mb-1">Add Note:</label>
                <textarea name="note" class="w-full border rounded-md p-2 text-sm"></textarea>
            </div>

            <!-- Profile Photo -->
            <div class="col-span-2">
                <label class="block font-semibold mb-1">Profile Photo:</label>
                <input type="file" name="photo_path" class="w-full text-sm">
            </div>

            <!-- Password -->
            <div>
                <label class="block font-semibold mb-1">Password:</label>
                <input type="password" name="password" class="w-full border rounded-md p-2  text-sm" required>
            </div>

            <div>
                <label class="block font-semibold mb-1">Confirm Password:</label>
                <input type="password" name="password_confirmation" class="w-full border rounded-md p-2  text-sm" required>
            </div>

        </div>

        <div class="flex justify-center">
            <button type="submit" class="mt-4 bg-green-700 text-white px-7 py-3 rounded-md hover:bg-green-800 text-sm font-semibold">
                Save Driver
            </button>

        </div>


    </form>
</div>
@endsection