<h2 class="font-bold text-sm mb-2 mt-6 text-gray-700">Vehicle Information</h2>
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-gray-700 text-xs">

    <div>
        <p class="text-[11px] font-semibold text-gray-500">Car Type</p>
        <select name="car_type" class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs">
            <option value="Renting" {{ old('car_type') == 'Renting' ? 'selected' : '' }}>Renting</option>
            <option value="Own" {{ old('car_type') == 'Own' ? 'selected' : '' }}>Own</option>
        </select>
    </div>

    <div>
        <p class="text-[11px] font-semibold text-gray-500">Plate Number</p>
        <input type="text" name="plate_number" value="{{ old('plate_number') }}" class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs" required>
    </div>

    <div>
        <p class="text-[11px] font-semibold text-gray-500">Year Model</p>
        <input type="number" name="year_model" value="{{ old('year_model') }}" class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs" required>
    </div>

    <div>
        <p class="text-[11px] font-semibold text-gray-500">Brand Model</p>
        <input type="text" name="brand_model" value="{{ old('brand_model') }}" class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs" required>
    </div>

    <div>
        <p class="text-[11px] font-semibold text-gray-500">Unit Service Type</p>
        <select name="unit_service_type" class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs">
            <option value="Car" {{ old('unit_service_type') == 'Car' ? 'selected' : '' }}>Car</option>
            <option value="Motor" {{ old('unit_service_type') == 'Motor' ? 'selected' : '' }}>Motor</option>
            <option value="SUV" {{ old('unit_service_type') == 'SUV' ? 'selected' : '' }}>SUV</option>
            <option value="Truck" {{ old('unit_service_type') == 'Truck' ? 'selected' : '' }}>Truck</option>
        </select>
    </div>
</div>