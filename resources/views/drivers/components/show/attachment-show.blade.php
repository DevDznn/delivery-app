<div id="attachments" class="tab-content hidden">
    <div class="bg-gradient-to-r from-[#F0F8FF] via-white to-green-50 rounded-2xl shadow-md p-6 hover:shadow-lg transition">
        <h2 class="text-lg font-bold mb-6 text-green-700">Attachments</h2>
        @if($driver->vehicle && $driver->vehicle->attachments->count())
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-gray-700 text-xs">
            @foreach(['resident_permit','driver_license','estermara_registration','passport','other'] as $type)
            @php
            $attachment = $driver->vehicle->attachments->firstWhere('attachment_type', $type);
            @endphp
            <div>
                <p class="text-[11px] font-semibold text-gray-500">{{ ucwords(str_replace('_',' ',$type)) }}</p>
                @if($attachment)
                <img src="{{ asset('storage/' . $attachment->file_path) }}" alt="{{ $type }}" class="mt-1 rounded-lg shadow-sm w-full max-h-48 object-cover">
                @else
                <div class="mt-1 p-3 rounded-lg bg-white/90 shadow-sm text-gray-500">No file uploaded</div>
                @endif
            </div>
            @endforeach
        </div>
        @else
        <p class="text-gray-700 text-xs">No attachments uploaded.</p>
        @endif
    </div>
</div>