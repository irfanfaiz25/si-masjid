<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite('resources/css/app.css')

    <title>Si-Masjid</title>

    {{-- logo title --}}
    <link rel="icon" href="{{ asset('img/Logo.png') }}">

    <!-- Include Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- google font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">

    {{-- icon --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>

    <link rel="stylesheet" href="https://printjs-4de6.kxcdn.com/print.min.css">
    <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>

    @livewireStyles
</head>

<body class="bg-[#FAFAFA] dark:bg-[#1c1c1c] font-sans">

    {{-- @livewire('header-layout') --}}

    <div class="relative">
        <div class="flex gap-6 pt-10">

            @livewire('sidebar-toggle')

            <div
                class="flex-1 p-4 text-xl bg-[#FAFAFA] dark:bg-[#1c1c1c] text-gray-900 dark:text-gray-50 font-semibold overflow-auto relative min-h-screen duration-500 -ml-5 lg:ml-64">

                @yield('content')

            </div>
        </div>
    </div>

    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    @livewireScripts

    <x-toaster-hub />
    @stack('scripts')
</body>

</html>
