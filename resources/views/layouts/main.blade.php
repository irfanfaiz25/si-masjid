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
    <link
        href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Eczar:wght@400..800&family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    {{-- icon --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>

    @livewireStyles
</head>

<body>
    <div class="flex" x-data="{ open: true }">
        <!-- Toggle Button -->
        <button x-cloak x-show="!open" @click="open = true"
            class="fixed top-4 left-4 z-40 px-4 py-2.5 text-white bg-emerald-600 rounded-lg shadow-lg hover:bg-emerald-700 focus:outline-none transition-all duration-300 ease-in-out">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Sidebar -->
        <div class="fixed inset-y-0 left-0 z-30 w-80 transition-transform duration-300 ease-in-out transform bg-gradient-to-b from-emerald-800 to-emerald-600 text-white"
            :class="{ 'translate-x-0': open, '-translate-x-full': !open }">

            <!-- Logo Section -->
            <div class="flex items-center justify-between p-4">
                <div class="flex items-center space-x-3">
                    <img src="{{ asset('img/Logo.png') }}" class="w-10 h-10" alt="Logo">
                    <span class="text-xl font-semibold">Si-Masjid</span>
                </div>
                <button @click="open = !open" class="px-4 py-2.5 rounded-lg hover:bg-emerald-700 focus:outline-none">
                    <i class="fas fa-chevron-left"></i>
                </button>
            </div>

            <!-- Navigation Links -->
            <nav class="px-4 py-6 space-y-2">
                <a href="#"
                    class="flex items-center px-4 py-3 space-x-3 transition-colors rounded-lg hover:bg-emerald-700 group">
                    <i class="fas fa-home text-lg group-hover:scale-110 transition-transform"></i>
                    <span>Dashboard</span>
                </a>

                <a href="#"
                    class="flex items-center px-4 py-3 space-x-3 transition-colors rounded-lg hover:bg-emerald-700 group">
                    <i class="fas fa-mosque text-lg group-hover:scale-110 transition-transform"></i>
                    <span>Jadwal Sholat</span>
                </a>

                <a href="#"
                    class="flex items-center px-4 py-3 space-x-3 transition-colors rounded-lg hover:bg-emerald-700 group">
                    <i class="fas fa-hand-holding-dollar text-lg group-hover:scale-110 transition-transform"></i>
                    <span>Zakat</span>
                </a>

                <a href="#"
                    class="flex items-center px-4 py-3 space-x-3 transition-colors rounded-lg hover:bg-emerald-700 group">
                    <i class="fas fa-calendar-alt text-lg group-hover:scale-110 transition-transform"></i>
                    <span>Kegiatan</span>
                </a>

                <a href="#"
                    class="flex items-center px-4 py-3 space-x-3 transition-colors rounded-lg hover:bg-emerald-700 group">
                    <i class="fas fa-users text-lg group-hover:scale-110 transition-transform"></i>
                    <span>Jamaah</span>
                </a>
            </nav>

            <!-- User Profile Section -->
            <div class="absolute bottom-0 w-full p-4">
                <div class="flex items-center p-3 space-x-3 transition-colors rounded-lg hover:bg-emerald-700">
                    <img src="https://ui-avatars.com/api/?name=Admin" class="w-10 h-10 rounded-full">
                    <div>
                        <p class="font-medium">Admin Masjid</p>
                        <p class="text-sm opacity-80">admin@simasjid.com</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 ml-64">
            <!-- Your main content here -->
            @yield('content')
        </div>
    </div>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>
