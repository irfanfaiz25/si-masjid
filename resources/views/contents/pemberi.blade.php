@extends('layouts.main')

@section('content')
    <h2 class="text-3xl font-bold">
        Pemberi Zakat
    </h2>

    <div class="mt-7 w-full">
        @livewire('pemberi-table')
    </div>
@endsection
