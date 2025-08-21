@extends('layouts.app')

@section('title', 'Driver Information')

@section('content')
<div class="w-full px-4 py-6 bg-gradient-to-br from-[#E6F4FF] via-[#F0F8FF] to-[#E6FFF9] min-h-screen">

    <!-- Centered Container -->
    <div class="max-w-5xl mx-auto flex flex-col space-y-6">

        <!-- Profile Card -->
        <div class="bg-gradient-to-r from-green-100 via-[#F0F8FF] to-teal-100 rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition">
            <div class="bg-gradient-to-r from-green-600 to-teal-500 h-20 w-full flex items-center px-6">
                <h1 class="text-white font-bold text-lg">Driver Profile</h1>
            </div>

            <div class="p-6 flex flex-col md:flex-row items-center md:items-start gap-6">
                <!-- Profile Image -->
                <img src="{{ $driver->photo_path ? asset('storage/' . $driver->photo_path) : '/images/profile.jpg' }}"
                    alt="Driver Profile"
                    class="w-24 h-24 object-cover border-4 border-white shadow-md rounded-xl -mt-12 bg-white">

                <!-- Info Grid -->
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6 text-gray-700 text-xs w-full mt-2">
                    <div>
                        <span class="block font-semibold text-gray-900">Username</span>
                        <a href="#" class="text-green-600 hover:underline">{{ $driver->user->username ?? 'N/A' }}</a>
                    </div>
                    <div>
                        <span class="block font-semibold text-gray-900">SFD</span>
                        <span>{{ $driver->employment_type ?? 'N/A' }}</span>
                    </div>
                    <div>
                        <span class="block font-semibold text-gray-900">Driver Name</span>
                        <span>{{ $driver->user->name ?? 'N/A' }}</span>
                    </div>
                    <div>
                        <span class="block font-semibold text-gray-900">Driver Number</span>
                        <span>{{ $driver->driver_number ?? 'N/A' }}</span>
                    </div>
                    <div>
                        <span class="block font-semibold text-gray-900">Account Status</span>
                        <span class="flex items-center {{ $driver->status === 'Active' ? 'text-green-600' : 'text-red-600' }} font-semibold">
                            <span class="w-2 h-2 {{ $driver->status === 'Active' ? 'bg-green-600' : 'bg-red-600' }} rounded-full mr-2"></span>
                            {{ $driver->status ?? 'N/A' }}
                        </span>
                    </div>
                    <div>
                        <span class="block font-semibold text-gray-900">Suspended</span>
                        <span class="{{ $driver->is_suspended ? 'text-red-600' : 'text-green-600' }} font-semibold">
                            {{ $driver->is_suspended ? 'Yes' : 'No' }}
                        </span>
                    </div>
                    <div>
                        <span class="block font-semibold text-gray-900">Ceased</span>
                        <span class="{{ $driver->is_ceased ? 'text-red-600' : 'text-green-600' }} font-semibold">
                            {{ $driver->is_ceased ? 'Yes' : 'No' }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation Tabs -->
        <div class="flex rounded-xl overflow-hidden shadow bg-white/90 backdrop-blur-sm">
            <button data-target="driver-info" class="tab-button flex-1 py-3 text-xs font-semibold text-green-700 bg-gradient-to-r from-green-100 to-teal-100 border-b-4 border-green-600">Driver Information</button>
            <button data-target="vehicle-info" class="tab-button flex-1 py-3 text-xs font-semibold text-gray-600 hover:bg-gradient-to-r hover:from-green-50 hover:to-teal-50 transition">Vehicle Information</button>
            <button data-target="attachments" class="tab-button flex-1 py-3 text-xs font-semibold text-gray-600 hover:bg-gradient-to-r hover:from-green-50 hover:to-teal-50 transition">Attachments</button>
            <button data-target="logs" class="tab-button flex-1 py-3 text-xs font-semibold text-gray-600 hover:bg-gradient-to-r hover:from-green-50 hover:to-teal-50 transition">Logs</button>
        </div>

        <!-- Tab Contents -->
        @include('drivers.components.show.driver-show')

        @include('drivers.components.show.vehicle-show')

        @include('drivers.components.show.attachment-show')

        <div id="logs" class="tab-content hidden">
            <div class="bg-gradient-to-r from-[#F0F8FF] via-white to-green-50 rounded-2xl shadow-md p-6 hover:shadow-lg transition">
                <h2 class="text-lg font-bold mb-6 text-green-700">Logs</h2>
                <p class="text-gray-700 text-xs">Logs soon......not yet available</p>
            </div>
        </div>

    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tabs = document.querySelectorAll('.tab-button');
        const contents = document.querySelectorAll('.tab-content');

        function resetTabs() {
            tabs.forEach(t => {
                t.classList.remove('text-green-700', 'bg-gradient-to-r', 'from-green-100', 'to-teal-100', 'border-b-4', 'border-green-600');
                t.classList.add('text-gray-600');
            });
            contents.forEach(c => c.classList.add('hidden'));
        }

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                resetTabs();
                const target = tab.getAttribute('data-target');
                tab.classList.add('text-green-700', 'bg-gradient-to-r', 'from-green-100', 'to-teal-100', 'border-b-4', 'border-green-600');
                tab.classList.remove('text-gray-600');

                const content = document.getElementById(target);
                if (content) content.classList.remove('hidden');
            });
        });

        if (tabs.length > 0) tabs[0].click();
    });
</script>
@endpush