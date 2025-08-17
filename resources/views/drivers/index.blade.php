@extends('layouts.app')

@section('title', 'Driver Management')

@section('content')
<div class="max-w-7xl mx-auto p-6">

    @include('drivers.components.header')

    @include('drivers.components.flash-messages')

    @include('drivers.components.search-bar')

    @include('drivers.components.table')

    @include('drivers.components.pagination')


</div>
@endsection
