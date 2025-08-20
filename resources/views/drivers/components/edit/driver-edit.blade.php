  <h2 class="font-bold text-lg mb-4">Personal Information</h2>
  <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-gray-700 text-xs">
      {{-- Username --}}
      <div>
          <p class="text-[11px] font-semibold text-gray-500">Username</p>
          <input type="text" value="{{ $driver->user->username }}" class="w-full mt-1 p-3 rounded-lg bg-gray-100 border shadow-sm text-xs" disabled>
      </div>

      {{-- Driver Name --}}
      <div>
          <p class="text-[11px] font-semibold text-gray-500">Driver Name</p>
          <input type="text" name="name" value="{{ old('name', $driver->user->name) }}" class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs" required>
      </div>

      {{-- Driver Number --}}
      <div>
          <p class="text-[11px] font-semibold text-gray-500">Driver Number</p>
          <input type="text" name="driver_number" value="{{ old('driver_number', $driver->driver_number) }}" class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs" required>
      </div>

      {{-- Employment Type --}}
      <div>
          <p class="text-[11px] font-semibold text-gray-500">Employment Type</p>
          <select name="employment_type" class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs" required>
              <option value="Full Time" {{ $driver->employment_type === 'Full Time' ? 'selected' : '' }}>Full Time</option>
              <option value="Part Time" {{ $driver->employment_type === 'Part Time' ? 'selected' : '' }}>Part Time</option>
          </select>
      </div>

      {{-- Status --}}
      <div>
          <p class="text-[11px] font-semibold text-gray-500">Account Status</p>
          <select name="status" class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs" required>
              <option value="Active" {{ $driver->status === 'Active' ? 'selected' : '' }}>Active</option>
              <option value="Inactive" {{ $driver->status === 'Inactive' ? 'selected' : '' }}>Inactive</option>
          </select>
      </div>

      {{-- Suspended --}}
      <div>
          <p class="text-[11px] font-semibold text-gray-500">Suspended</p>
          <select name="is_suspended" class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs">
              <option value="0" {{ !$driver->is_suspended ? 'selected' : '' }}>No</option>
              <option value="1" {{ $driver->is_suspended ? 'selected' : '' }}>Yes</option>
          </select>
      </div>

      {{-- Ceased --}}
      <div>
          <p class="text-[11px] font-semibold text-gray-500">Ceased</p>
          <select name="is_ceased" class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs">
              <option value="0" {{ !$driver->is_ceased ? 'selected' : '' }}>No</option>
              <option value="1" {{ $driver->is_ceased ? 'selected' : '' }}>Yes</option>
          </select>
      </div>

      {{-- ID/Iqarna --}}
      <div>
          <p class="text-[11px] font-semibold text-gray-500">ID/Iqarna</p>
          <input type="text" name="id_iqarna" value="{{ old('id_iqarna', $driver->id_iqarna) }}" class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs" required>
      </div>

      {{-- Iqama Issue --}}
      <div>
          <p class="text-[11px] font-semibold text-gray-500">Iqama # Issue Date</p>
          <input type="date" id="iqama_issue" name="iqama_issue"
              value="{{ old('iqama_issue', $driver->iqama_issue ? $driver->iqama_issue->format('Y-m-d') : '') }}"
              class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs">
      </div>

      {{-- Iqama Duration --}}
      <div>
          <p class="text-[11px] font-semibold text-gray-500">Iqama Validity</p>
          <select id="iqama_duration" name="iqama_duration"
              class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs">
              <option value="">Select Duration</option>
              @for ($i = 1; $i <= 5; $i++)
                  <option value="{{ $i }}" {{ old('iqama_duration', $driver->iqama_duration) == $i ? 'selected' : '' }}>{{ $i }} Year{{ $i > 1 ? 's' : '' }}</option>
                  @endfor
          </select>
      </div>

      {{-- Auto-Calculated Expiry --}}
      <div>
          <p class="text-[11px] font-semibold text-gray-500">Iqama # Expiry Date</p>
          <input type="date" id="iqama_expiry" name="id_iqarna_expiry"
              value="{{ old('id_iqarna_expiry', $driver->id_iqarna_expiry? $driver->id_iqarna_expiry->format('Y-m-d') : '') }}"
              class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs bg-gray-100"
              readonly>
      </div>

      {{-- Date of Birth --}}
      <div>
          <p class="text-[11px] font-semibold text-gray-500">Date of Birth</p>
          <input type="date" name="dob" value="{{ old('dob', $driver->dob->format('Y-m-d')) }}" class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs" required>
      </div>

      {{-- Nationality --}}
      <div>
          <p class="text-[11px] font-semibold text-gray-500">Nationality</p>
          <input type="text" name="nationality" value="{{ old('nationality', $driver->nationality) }}" class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs" required>
      </div>

      {{-- Country --}}
      <div>
          <p class="text-[11px] font-semibold text-gray-500">COuntry</p>
          <input type="text" name="country" value="{{ old('country', $driver->country) }}" class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs" required>
      </div>

      {{-- City --}}
      <div>
          <p class="text-[11px] font-semibold text-gray-500">City</p>
          <input type="text" name="city" value="{{ old('city', $driver->city) }}" class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs" required>
      </div>

      {{--IMIE --}}
      <div>
          <p class="text-[11px] font-semibold text-gray-500">IMIE</p>
          <input type="text" name="imei" value="{{ old('imei', $driver->imei) }}" class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs" required>
      </div>


      {{-- Gender --}}
      <div>
          <p class="text-[11px] font-semibold text-gray-500">Gender</p>
          <select name="gender" class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs">
              <option value="Male" {{ $driver->gender === 'Male' ? 'selected' : '' }}>Male</option>
              <option value="Female" {{ $driver->gender === 'Female' ? 'selected' : '' }}>Female</option>
              <option value="Other" {{ $driver->gender === 'Other' ? 'selected' : '' }}>Other</option>
          </select>
      </div>

      {{-- Phone --}}
      <div>
          <p class="text-[11px] font-semibold text-gray-500">Phone Number</p>
          <input type="text" name="phone" value="{{ old('phone', $driver->user->phone) }}" class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs">
      </div>

      {{-- Profile Photo --}}
      <div class="md:col-span-2">
          <p class="text-[11px] font-semibold text-gray-500">Profile Photo</p>
          <input type="file" name="photo_path" class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs">
          @if($driver->photo_path)
          <img src="{{ asset('storage/' . $driver->photo_path) }}" alt="Photo" class="w-20 h-20 mt-3 rounded-xl object-cover shadow-md border">
          @endif
      </div>
  </div>