  <h2 class="font-bold text-lg mb-4">Vehicle Information</h2>
  <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-xs">

      {{-- Car Type --}}
      <div>
          <p class="text-[11px] font-semibold text-gray-500">Car Type</p>
          <select name="car_type" class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs">
              <option value="Renting" {{  $driver->vehicle->car_type === 'Renting' ? 'selected' : '' }}>Renting</option>
              <option value="Own" {{ $driver->vehicle->car_type === 'Own' ? 'selected' : '' }}>Own</option>
          </select>
      </div>

      {{-- Plate Number --}}
      <div>
          <p class="text-[11px] font-semibold text-gray-500">Plate Number</p>
          <input type="text" name="plate_number" value="{{ old('plate_number', $driver->vehicle->plate_number ?? '') }}" class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs">
      </div>

      {{-- Year Model --}}
      <div>
          <p class="text-[11px] font-semibold text-gray-500">Year Model</p>
          <input type="text" name="year_model" value="{{ old('year_model', $driver->vehicle->year_model ?? '') }}" class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs">
      </div>

      {{-- Brand / Model --}}
      <div>
          <p class="text-[11px] font-semibold text-gray-500">Brand / Model</p>
          <input type="text" name="brand_model" value="{{ old('brand_model', $driver->vehicle->brand_model ?? '') }}" class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs">
      </div>

      {{-- Unit Service Type --}}
      <div>
          <p class="text-[11px] font-semibold text-gray-500">Unit Service Type</p>
          <select name="unit_service_type" class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs">
              <option value="Car" {{  $driver->vehicle->unit_service_type === 'Car' ? 'selected' : '' }}>Car</option>
              <option value="Motor" {{ $driver->vehicle->unit_service_type === 'Motor' ? 'selected' : '' }}>Motor</option>
              <option value="SUV" {{ $driver->vehicle->unit_service_type === 'SUV' ? 'selected' : '' }}>SUV</option>
              <option value="Truck" {{ $driver->vehicle->unit_service_type === 'Truck' ? 'selected' : '' }}>Truck</option>
          </select>
      </div>
  </div>