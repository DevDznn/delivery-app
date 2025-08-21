<div id="vehicle-info" class="tab-content hidden">
    <div class="bg-gradient-to-r from-[#F0F8FF] via-white to-green-50 rounded-2xl shadow-md p-6 hover:shadow-lg transition">
        <h2 class="text-lg font-bold mb-6 text-green-700">Vehicle Information</h2>
        @if($driver->vehicle)
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-gray-700 text-xs">
            <div>
                <p class="text-[11px] font-semibold text-gray-500">Full Name</p>
                <div class="mt-1 p-3 rounded-lg bg-white/90 shadow-sm">{{ $driver->user->name ?? 'N/A' }}</div>
            </div>
            <div>
                <p class="text-[11px] font-semibold text-gray-500">Iqama #</p>
                <div class="mt-1 p-3 rounded-lg bg-white/90 shadow-sm">{{ $driver->id_iqarna ?? 'N/A' }}</div>
            </div>
            <div>
                <p class="text-[11px] font-semibold text-gray-500">Car Type</p>
                <div class="mt-1 p-3 rounded-lg bg-white/90 shadow-sm">{{ $driver->vehicle->car_type ?? 'N/A' }}</div>
            </div>
            <div>
                <p class="text-[11px] font-semibold text-gray-500">Plate Number</p>
                <div class="mt-1 p-3 rounded-lg bg-white/90 shadow-sm">{{ $driver->vehicle->plate_number ?? 'N/A' }}</div>
            </div>
            <div>
                <p class="text-[11px] font-semibold text-gray-500">Year Model</p>
                <div class="mt-1 p-3 rounded-lg bg-white/90 shadow-sm">{{ $driver->vehicle->year_model ?? 'N/A' }}</div>
            </div>
            <div>
                <p class="text-[11px] font-semibold text-gray-500">Brand Model</p>
                <div class="mt-1 p-3 rounded-lg bg-white/90 shadow-sm">{{ $driver->vehicle->brand_model ?? 'N/A' }}</div>
            </div>
            <div>
                <p class="text-[11px] font-semibold text-gray-500">Unit Service Type</p>
                <div class="mt-1 p-3 rounded-lg bg-white/90 shadow-sm">{{ $driver->vehicle->unit_service_type ?? 'N/A' }}</div>
            </div>
        </div>
        @else
        <p class="text-gray-700 text-xs">No vehicle assigned.</p>
        @endif
    </div>
</div>

