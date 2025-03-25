@extends('layouts.main')

@section('content')
    <div class="w-full grid grid-cols-3 gap-4">
        <div class="h-52 border border-emerald-500 rounded-lg"></div>
        <div class="h-52 border border-emerald-500 rounded-lg"></div>
        <div class="h-52 border border-emerald-500 rounded-lg"></div>
    </div>

    @livewire('dashboard-tabs')

    {{-- <div class="mt-4 w-full grid grid-cols-2 gap-4">

        @livewire('pemberi-dashboard')

        @livewire('penerima-dashboard')

    </div> --}}
@endsection
