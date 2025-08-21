<div id="driver-info" class="tab-content">
    <div class="bg-gradient-to-r from-[#F0F8FF] via-white to-green-50 rounded-2xl shadow-md p-6 hover:shadow-lg transition">
        <h2 class="text-lg font-bold mb-6 text-green-700">Driver Information</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-gray-700 text-xs">
            <div>
                <p class="text-[11px] font-semibold text-gray-500">ID Resident/Iqama #</p>
                <div class="mt-1 p-3 rounded-lg bg-white/90 shadow-sm">{{ $driver->id_iqarna ?? 'N/A' }}</div>
            </div>
            <div>
                <p class="text-[11px] font-semibold text-gray-500">ID Resident/Iqama # Expiry Date</p>
                <div class="mt-1 p-3 rounded-lg bg-white/90 shadow-sm">
                    {{ $driver->id_iqarna_expiry ? \Carbon\Carbon::parse($driver->id_iqarna_expiry)->format('m/d/Y') : 'N/A' }}
                </div>
            </div>
            <div>
                <p class="text-[11px] font-semibold text-gray-500">Date of Birth</p>
                <div class="mt-1 p-3 rounded-lg bg-white/90 shadow-sm">
                    {{ $driver->dob ? \Carbon\Carbon::parse($driver->dob)->format('m/d/Y') : 'N/A' }}
                </div>
            </div>
            <div>
                <p class="text-[11px] font-semibold text-gray-500">Nationality</p>
                <div class="mt-1 p-3 rounded-lg bg-white/90 shadow-sm">{{ $driver->nationality ?? 'N/A' }}</div>
            </div>
            <div>
                <p class="text-[11px] font-semibold text-gray-500">Country</p>
                <div class="mt-1 p-3 rounded-lg bg-white/90 shadow-sm">{{ $driver->country ?? 'N/A' }}</div>
            </div>
            <div>
                <p class="text-[11px] font-semibold text-gray-500">City</p>
                <div class="mt-1 p-3 rounded-lg bg-white/90 shadow-sm">{{ $driver->city ?? 'N/A' }}</div>
            </div>
            <div>
                <p class="text-[11px] font-semibold text-gray-500">IMEI</p>
                <div class="mt-1 p-3 rounded-lg bg-white/90 shadow-sm">{{ $driver->imei ?? 'N/A' }}</div>
            </div>
            <div>
                <p class="text-[11px] font-semibold text-gray-500">Phone Number</p>
                <div class="mt-1 p-3 rounded-lg bg-white/90 shadow-sm">{{ $driver->user->phone ?? 'N/A' }}</div>
            </div>
            <div>
                <p class="text-[11px] font-semibold text-gray-500">Gender</p>
                <div class="mt-1 p-3 rounded-lg bg-white/90 shadow-sm">{{ $driver->gender ?? 'N/A' }}</div>
            </div>
            <div class="md:col-span-2">
                <p class="text-[11px] font-semibold text-gray-500">Add Note</p>
                <div class="mt-1 p-3 rounded-lg bg-white/90 shadow-sm">{{ $driver->note ?? 'N/A' }}</div>
            </div>
        </div>
    </div>
</div>