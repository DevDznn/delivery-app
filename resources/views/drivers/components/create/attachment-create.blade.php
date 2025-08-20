<h2 class="font-bold text-sm mb-2 mt-6 text-gray-700">Attachments</h2>
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-gray-700 text-xs">
    <div>
        <p class="text-[11px] font-semibold text-gray-500">Resident Permit</p>
        <input type="file" name="attachments[resident_permit]" class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs">
    </div>
    <div>
        <p class="text-[11px] font-semibold text-gray-500">Driver License</p>
        <input type="file" name="attachments[driver_license]" class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs">
    </div>
    <div>
        <p class="text-[11px] font-semibold text-gray-500">Estermara / Registration</p>
        <input type="file" name="attachments[estermara_registration]" class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs">
    </div>
    <div>
        <p class="text-[11px] font-semibold text-gray-500">Passport</p>
        <input type="file" name="attachments[passport]" class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs">
    </div>
    <div class="md:col-span-2">
        <p class="text-[11px] font-semibold text-gray-500">Other (Optional)</p>
        <input type="file" name="attachments[other]" class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs">
    </div>
    <div>
        <p class="text-[11px] font-semibold text-gray-500">Password</p> <input type="password" name="password" class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs" required>
    </div>
    {{-- Confirm Password --}}
    <div>
        <p class="text-[11px] font-semibold text-gray-500">Confirm Password</p> <input type="password" name="password_confirmation" class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs" required>
    </div>
</div>