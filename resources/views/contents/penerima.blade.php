@extends('layouts.main')

@section('content')
    <h2 class="text-3xl font-bold">
        Data Penerima Zakat
    </h2>

    <div class="mt-7 w-full">
        @livewire('penerima-table')
    </div>
@endsection
