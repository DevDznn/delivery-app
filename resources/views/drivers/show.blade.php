@extends('layouts.app')

@section('title', 'Driver Information')

@section('content')
<div class="w-full px-4"> 

    <div class="flex flex-col text-xs space-y-4">
        <!-- Top Profile Card -->
        <div class="bg-white rounded-lg shadow-md p-6 flex items-center space-x-6 w-full overflow-x-auto">
            <img src="{{ $driver->photo_path ? asset('storage/' . $driver->photo_path) : '/images/profile.jpg' }}" 
                alt="Driver Profile"
                class="w-32 h-32 object-cover border rounded-md">

            <!-- Basic Information in Horizontal Cards -->
            <div class="flex items-start space-x-10 text-gray-800 text-sm whitespace-nowrap">
                <div class="flex flex-col">
                    <span class="font-semibold">Username:</span>
                    <span><a href="#" class="text-green-600 underline">{{ $driver->user->username ?? 'N/A' }}</a></span>
                </div>
                <div class="flex flex-col">
                    <span class="font-semibold">SFD:</span>
                    <span>{{ $driver->employment_type ?? 'N/A' }}</span>
                </div>
                <div class="flex flex-col">
                    <span class="font-semibold">Driver Name:</span>
                    <span>{{ $driver->user->name ?? 'N/A' }}</span>
                </div>
                <div class="flex flex-col">
                    <span class="font-semibold">Driver Number:</span>
                    <span>{{ $driver->driver_number ?? 'N/A' }}</span>
                </div>
                <div class="flex flex-col">
                    <span class="font-semibold">Account Status:</span>
                    <span class="flex items-center justify-center {{ $driver->status === 'Active' ? 'text-green-600' : 'text-red-600' }} font-semibold">
                        <span class="w-2 h-2 {{ $driver->status === 'Active' ? 'bg-green-600' : 'bg-red-600' }} rounded-full mr-2"></span>
                        {{ $driver->status ?? 'N/A' }}
                    </span>
                </div>
                <div class="flex flex-col">
                    <span class="font-semibold">Suspended:</span>
                    <span class="flex justify-center {{ $driver->is_suspended ? 'text-red-600' : 'text-green-600' }} font-semibold">
                        {{ $driver->is_suspended ? 'Yes' : 'No' }}
                    </span>
                </div>
                <div class="flex flex-col">
                    <span class="font-semibold">Ceased:</span>
                    <span class="flex justify-center {{ $driver->is_ceased ? 'text-red-600' : 'text-green-600' }} font-semibold">
                        {{ $driver->is_ceased ? 'Yes' : 'No' }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Navigation Links -->
        <div class="flex border-b text-center bg-white rounded-lg shadow-md overflow-hidden w-full">
            <button class="flex-1 py-3 text-xs font-semibold text-green-700 border-b-4 border-green-700">Driver Information</button>
            <button class="flex-1 py-3 text-xs font-semibold text-gray-500 hover:text-blue-600">Vehicle Information</button>
            <button class="flex-1 py-3 text-xs font-semibold text-gray-500 hover:text-blue-600">Attachments</button>
            <button class="flex-1 py-3 text-xs font-semibold text-gray-500 hover:text-blue-600">Logs</button>
        </div>

        <!-- Driver Information Card -->
        <div class="bg-white rounded-lg shadow-md p-6 w-full">
            <h2 class="text-xl font-bold mb-4 text-green-700">Driver Information</h2>

            <!-- Info Grid -->
            <div class="grid grid-cols-2 gap-4 text-gray-700 text-xs">
                <div>
                    <label class="block font-semibold mb-1">ID/Iqarna:</label>
                    <div class="border rounded-md p-2 bg-gray-50">{{ $driver->id_iqarna ?? 'N/A' }}</div>
                </div>
                <div>
                    <label class="block font-semibold mb-1">ID/Iqarna Expiry Date:</label>
                    <div class="border rounded-md p-2 bg-gray-50">
                        {{ $driver->id_iqarna_expiry ? \Carbon\Carbon::parse($driver->id_iqarna_expiry)->format('m/d/Y') : 'N/A' }}
                    </div>
                </div>
                <div>
                    <label class="block font-semibold mb-1">Date of Birth:</label>
                    <div class="border rounded-md p-2 bg-gray-50">
                        {{ $driver->dob ? \Carbon\Carbon::parse($driver->dob)->format('m/d/Y') : 'N/A' }}
                    </div>
                </div>
                <div>
                    <label class="block font-semibold mb-1">Nationality:</label>
                    <div class="border rounded-md p-2 bg-gray-50">{{ $driver->nationality ?? 'N/A' }}</div>
                </div>
                <div>
                    <label class="block font-semibold mb-1">Country:</label>
                    <div class="border rounded-md p-2 bg-gray-50">{{ $driver->country ?? 'N/A' }}</div>
                </div>
                <div>
                    <label class="block font-semibold mb-1">City:</label>
                    <div class="border rounded-md p-2 bg-gray-50">{{ $driver->city ?? 'N/A' }}</div>
                </div>
                <div>
                    <label class="block font-semibold mb-1">IMEI:</label>
                    <div class="border rounded-md p-2 bg-gray-50">{{ $driver->imei ?? 'N/A' }}</div>
                </div>
                <div>
                    <label class="block font-semibold mb-1">Phone Number:</label>
                    <div class="border rounded-md p-2 bg-gray-50">{{ $driver->user->phone ?? 'N/A' }}</div>
                </div>
                <div>
                    <label class="block font-semibold mb-1">Gender:</label>
                    <div class="border rounded-md p-2 bg-gray-50">{{ $driver->gender ?? 'N/A' }}</div>
                </div>
                <div class="col-span-2">
                    <label class="block font-semibold mb-1">Add Note:</label>
                    <div class="border rounded-md p-2 bg-gray-50">{{ $driver->note ?? 'N/A' }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
