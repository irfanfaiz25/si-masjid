@extends('layouts.main')
@section('content')
    <h2 class="text-3xl font-bold">
        Scan Label Zakat
    </h2>

    <div class="mt-7 w-full">
        @livewire('label-scanner')
    </div>
@endsection
