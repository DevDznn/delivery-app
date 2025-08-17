{{-- resources/views/drivers/components/flash-messages.blade.php --}}
@if(session('success'))
    <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
        {{ session('success') }}
    </div>
@endif
