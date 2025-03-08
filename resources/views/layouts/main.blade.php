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
    @vite('resources/css/app.css')

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

    @livewireStyles
</head>

<body>
    <div class="flex bg-gray-50" x-data="{ open: true }">
        <!-- Toggle Button -->
        <button x-cloak x-show="!open" @click="open = true"
            class="fixed top-4 left-4 z-40 px-4 py-2 text-gray-900 hover:text-gray-50 border border-emerald-500 hover:bg-emerald-500 rounded-lg shadow-lg focus:outline-none transition-all duration-300 ease-in-out cursor-pointer">
            <i class="fas fa-bars text-sm"></i>
        </button>

        <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- Main Content -->
        <div class="flex-1 px-8 py-6 w-full h-screen bg-gray-50 transition-all duration-300"
            :class="{ 'ml-80': open, 'ml-16': !open }">
            <!-- Your main content here -->
            @yield('content')
        </div>
    </div>

    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    @livewireScripts

    @stack('script')
</body>

</html>
