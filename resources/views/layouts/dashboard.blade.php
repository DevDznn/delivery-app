@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<h1 class="text-2xl font-bold mb-6">Welcome to the Apartment Management Dashboard</h1>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="bg-white shadow rounded-lg p-4">
        <h3 class="text-gray-500 text-sm">Total Apartments</h3>
        <p class="text-2xl font-bold">24</p>
    </div>
    <div class="bg-white shadow rounded-lg p-4">
        <h3 class="text-gray-500 text-sm">Total Tenants</h3>
        <p class="text-2xl font-bold">87</p>
    </div>
    <div class="bg-white shadow rounded-lg p-4">
        <h3 class="text-gray-500 text-sm">Available Units</h3>
        <p class="text-2xl font-bold">12</p>
    </div>
</div>
@endsection
