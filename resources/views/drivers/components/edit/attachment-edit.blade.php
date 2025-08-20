<h2 class="font-bold text-lg mb-4">Attachments </h2>

@php
$attachments = [
'resident_permit' => $driver->vehicle->attachments->firstWhere('attachment_type', 'resident_permit'),
'driver_license' => $driver->vehicle->attachments->firstWhere('attachment_type', 'driver_license'),
'estermara_registration' => $driver->vehicle->attachments->firstWhere('attachment_type', 'estermara_registration'),
'passport' => $driver->vehicle->attachments->firstWhere('attachment_type', 'passport'),
'other' => $driver->vehicle->attachments->firstWhere('attachment_type', 'other'),
];
@endphp

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-gray-700 text-xs">

    @foreach ($attachments as $type => $file)
    <div @class(['md:col-span-2'=> $type === 'other'])>
        <p class="text-[11px] font-semibold text-gray-500">{{ ucwords(str_replace('_', ' ', $type)) }}</p>
        <input type="file" name="attachments[{{ $type }}]" class="w-full mt-1 p-3 rounded-lg border shadow-sm text-xs">

        {{-- Show current file as image if exists and is image --}}
        @if ($file && in_array(pathinfo($file->file_path, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png']))
        <img src="{{ asset('storage/' . $file->file_path) }}"
            alt="{{ $type }}"
            class="w-20 h-20 mt-3 rounded-xl object-cover shadow-md border">
        @endif
    </div>
    @endforeach

</div>