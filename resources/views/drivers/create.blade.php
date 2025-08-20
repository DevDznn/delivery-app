@extends('layouts.app')

@section('title', 'Add Driver')

@section('content')
<div class="w-full px-4 py-6 min-h-screen">

    <div class="flex flex-col space-y-6">

        <!-- Add Driver + Vehicle Card -->
        <div class="bg-gradient-to-r from-green-100 via-[#F0F8FF] to-teal-100 rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition">

            <!-- Gradient Header Bar -->
            <div class="bg-gradient-to-r from-green-600 to-teal-500 h-16 w-full flex items-center px-6">
                <h1 class="text-white font-bold text-2xl">Add Driver</h1>
            </div>

            <div class="p-6 text-xs">

                {{-- Validation Errors --}}
                @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4 text-xs">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                {{-- Success Message --}}
                @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4 text-xs">
                    {{ session('success') }}
                </div>
                @endif

                <form action="{{ route('drivers.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <!-- Driver Info -->
                    @include('drivers.components.create.driver-create')

                    <!-- Vehicle Info -->
                    @include('drivers.components.create.vehicle-create')

                    @include('drivers.components.create.attachment-create')

                    {{-- Actions --}}
                    <div class="mt-6 flex justify-between items-center">
                        <a href="{{ route('drivers.index') }}" class="px-4 py-2 rounded-lg text-white bg-red-600 hover:bg-red-700 shadow text-xs transition">
                            Cancel
                        </a>
                        <button type="submit" class="px-6 py-2 rounded-lg text-white bg-green-600 hover:bg-green-700 shadow text-xs transition">
                            Save Driver
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const issueInput = document.getElementById("iqama_issue");
        const durationSelect = document.getElementById("iqama_duration");
        const expiryInput = document.getElementById("iqama_expiry");

        function calculateExpiry() {
            let issueDate = new Date(issueInput.value);
            let years = parseInt(durationSelect.value);

            if (!isNaN(issueDate.getTime()) && years) {
                let expiryDate = new Date(issueDate);
                expiryDate.setFullYear(expiryDate.getFullYear() + years);

                let yyyy = expiryDate.getFullYear();
                let mm = String(expiryDate.getMonth() + 1).padStart(2, '0');
                let dd = String(expiryDate.getDate()).padStart(2, '0');
                expiryInput.value = `${yyyy}-${mm}-${dd}`;
            } else {
                expiryInput.value = "";
            }
        }

        issueInput.addEventListener("change", calculateExpiry);
        durationSelect.addEventListener("change", calculateExpiry);
    });
</script>