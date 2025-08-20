<h2 class="font-bold text-sm mb-2 text-gray-700">Driver Information</h2>
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-gray-700 text-xs">
    {{-- Username (Auto-generated) --}}
    <div>
        <p class="text-[11px] font-semibold text-gray-500">Username</p>
        <div class="w-full mt-1 p-3 rounded-lg bg-gray-100 border shadow-sm text-gray-500 text-xs">
            Automated by System
        </div>
    </div>

    {{-- Driver Name --}}
    <div>
        <p class="text-[11px] font-semibold text-gray-500">Driver Name</p>
        <input type="text" name="name" value="{{ old('name') }}" class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs" required>
    </div>

    {{-- Driver Number --}}
    <div>
        <p class="text-[11px] font-semibold text-gray-500">Driver Number</p>
        <input type="text" name="driver_number" value="{{ old('driver_number') }}" class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs" required>
    </div>

    {{-- SFD --}}
    <div>
        <p class="text-[11px] font-semibold text-gray-500">SFD</p>
        <select name="employment_type" class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs" required>
            <option value="Full Time" {{ old('employment_type') == 'Full Time' ? 'selected' : '' }}>Full Time</option>
            <option value="Part Time" {{ old('employment_type') == 'Part Time' ? 'selected' : '' }}>Part Time</option>
        </select>
    </div>

    {{-- Status --}}
    <div>
        <p class="text-[11px] font-semibold text-gray-500">Account Status</p>
        <select name="status" class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs" required>
            <option value="Active" {{ old('status') == 'Active' ? 'selected' : '' }}>Active</option>
            <option value="Inactive" {{ old('status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
        </select>
    </div>

    {{-- Suspended --}}
    <div>
        <p class="text-[11px] font-semibold text-gray-500">Suspended</p>
        <select name="is_suspended" class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs">
            <option value="0" {{ old('is_suspended') == '0' ? 'selected' : '' }}>No</option>
            <option value="1" {{ old('is_suspended') == '1' ? 'selected' : '' }}>Yes</option>
        </select>
    </div>

    {{-- Ceased --}}
    <div>
        <p class="text-[11px] font-semibold text-gray-500">Ceased</p>
        <select name="is_ceased" class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs">
            <option value="0" {{ old('is_ceased') == '0' ? 'selected' : '' }}>No</option>
            <option value="1" {{ old('is_ceased') == '1' ? 'selected' : '' }}>Yes</option>
        </select>
    </div>

    {{-- ID/Iqarna --}}
    <div>
        <p class="text-[11px] font-semibold text-gray-500">ID Resident/Iqama #</p>
        <input type="text" name="id_iqarna" value="{{ old('id_iqarna') }}" class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs" required>
    </div>

    {{-- Iqama Issue Date --}}
    <div>
        <p class="text-[11px] font-semibold text-gray-500">Iqama # Issue Date</p>
        <input type="date" id="iqama_issue" name="iqama_issue"
            value="{{ old('iqama_issue') }}"
            class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs" required>
    </div>

    {{-- Duration --}}
    <div>
        <p class="text-[11px] font-semibold text-gray-500">Iqama # Validity</p>
        <select id="iqama_duration" name="iqama_duration"
            class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs" required>
            <option value="">Select Duration</option>
            <option value="1">1 Years</option>
            <option value="2">2 Years</option>
            <option value="3">3 Years</option>
            <option value="4">4 Years</option>
            <option value="5">5 Years</option>
        </select>
    </div>

    {{-- Expiry Date (Auto-filled) --}}
    <div>
        <p class="text-[11px] font-semibold text-gray-500">Iqama # Expiry Date</p>
        <input type="date" id="iqama_expiry" name="id_iqarna_expiry"
            value="{{ old('id_iqarna_expiry') }}"
            class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs" readonly required>
    </div>

    {{-- DOB --}}
    <div>
        <p class="text-[11px] font-semibold text-gray-500">Date of Birth</p>
        <input type="date" name="dob" value="{{ old('dob') }}" class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs" required>
    </div>

    {{-- Nationality --}}
    <div>
        <p class="text-[11px] font-semibold text-gray-500">Nationality</p>
        <input type="text" name="nationality" value="{{ old('nationality') }}" class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs" required>
    </div>

    {{-- Country --}}
    <div>
        <p class="text-[11px] font-semibold text-gray-500">Country</p>
        <input type="text" name="country" value="{{ old('country') }}" class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs" required>
    </div>

    {{-- City --}}
    <div>
        <p class="text-[11px] font-semibold text-gray-500">City</p>
        <input type="text" name="city" value="{{ old('city') }}" class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs" required>
    </div>

    {{-- IMEI --}}
    <div>
        <p class="text-[11px] font-semibold text-gray-500">IMEI</p>
        <input type="text" name="imei" value="{{ old('imei') }}" class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs" required>
    </div>

    {{-- Phone --}}
    <div>
        <p class="text-[11px] font-semibold text-gray-500">Phone Number</p>
        <input type="text" name="phone" value="{{ old('phone') }}" class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs">
    </div>

    {{-- Gender --}}
    <div>
        <p class="text-[11px] font-semibold text-gray-500">Gender</p>
        <select name="gender" class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs">
            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
            <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
        </select>
    </div>

    {{-- Note --}}
    <div class="md:col-span-2">
        <p class="text-[11px] font-semibold text-gray-500">Note</p>
        <textarea name="note" class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs">{{ old('note') }}</textarea>
    </div>

    {{-- Profile Photo --}}
    <div class="md:col-span-2">
        <p class="text-[11px] font-semibold text-gray-500">Profile Photo</p>
        <input type="file" name="photo_path" class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs">
    </div>

   
</div>