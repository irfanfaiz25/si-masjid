<div class="fixed inset-y-0 left-0 z-30 w-80 transition-transform duration-300 ease-in-out transform bg-gray-50 text-white"
    :class="{ 'translate-x-0': open, '-translate-x-full': !open }">

    <!-- Logo Section -->
    <div class="flex items-center justify-between p-4">
        <div class="flex items-center space-x-3">
            <img src="{{ asset('/storage/img/si-masjid.png') }}" class="h-10" alt="Logo">
            <span class="text-xl font-semibold text-gray-900">Si-<span class="text-emerald-700">Masjid</span>
        </div>
        <button @click="open = !open"
            class="px-4 py-2 rounded-lg text-gray-900 hover:text-gray-50 border border-emerald-500 hover:bg-emerald-500 focus:outline-none cursor-pointer">
            <i class="fas fa-chevron-left text-sm"></i>
        </button>
    </div>

    <!-- Navigation Links -->
    <nav class="px-4 py-6 space-y-2">
        <a href="#"
            class="flex items-center px-4 py-3 space-x-3 transition-colors rounded-lg text-gray-900 hover:bg-emerald-100 border border-gray-50 hover:border-emerald-500 group cursor-pointer font-medium duration-300">
            <i class="fas fa-home text-lg group-hover:scale-110 transition-transform"></i>
            <span>Dashboard</span>
        </a>

        {{-- <a href=""
            class="flex items-center px-4 py-3 space-x-3 transition-colors rounded-lg hover:bg-emerald-700 group">
            <i class="fas fa-mosque text-lg group-hover:scale-110 transition-transform"></i>
            <span>Jadwal Sholat</span>
        </a> --}}

        <div x-data="{ isOpen: false }" class="relative">
            <button @click="isOpen = !isOpen"
                class="flex items-center w-full px-4 py-3 space-x-3 transition-colors rounded-lg text-gray-900 hover:bg-emerald-100 border {{ request()->is('pemberi-zakat') || request()->is('penerima-zakat') ? 'bg-emerald-100 border border-emerald-500' : 'border-gray-50 hover:border-emerald-500' }} group cursor-pointer font-medium duration-300">
                <i class="fas fa-coins text-lg group-hover:scale-110 transition-transform"></i>
                <span>Zakat</span>
                <i class="fas fa-chevron-down ml-auto transition-transform" :class="{ 'rotate-180': isOpen }"></i>
            </button>

            <div x-show="isOpen" x-transition class="pl-4 space-y-1 mt-1">
                <a href="{{ route('pemberi.index') }}"
                    class="flex items-center px-4 py-3 space-x-3 transition-colors rounded-lg text-gray-900 hover:bg-emerald-100 border {{ request()->is('pemberi-zakat') ? 'bg-emerald-100 border border-emerald-500' : 'border-gray-50 hover:border-emerald-500' }} group cursor-pointer font-medium duration-300">
                    <i class="fas fa-address-card group-hover:scale-110 transition-transform"></i>
                    <span>Data Pemberi</span>
                </a>
                <a href="#"
                    class="flex items-center px-4 py-3 space-x-3 transition-colors rounded-lg text-gray-900 hover:bg-emerald-100 border border-gray-50 hover:border-emerald-500 group cursor-pointer font-medium duration-300">
                    <i class="fas fa-hand-holding-dollar group-hover:scale-110 transition-transform"></i>
                    <span>Data Penerima</span>
                </a>
            </div>
        </div>

        {{-- <a href="#"
            class="flex items-center px-4 py-3 space-x-3 transition-colors rounded-lg hover:bg-emerald-700 group">
            <i class="fas fa-calendar-alt text-lg group-hover:scale-110 transition-transform"></i>
            <span>Kegiatan</span>
        </a>

        <a href="#"
            class="flex items-center px-4 py-3 space-x-3 transition-colors rounded-lg hover:bg-emerald-700 group">
            <i class="fas fa-users text-lg group-hover:scale-110 transition-transform"></i>
            <span>Jamaah</span>
        </a> --}}
    </nav>

    <!-- User Profile Section -->
    <div class="absolute bottom-0 w-full p-4">
        <div
            class="flex items-center p-3 space-x-3 transition-colors rounded-lg text-gray-900 hover:bg-emerald-100 hover:border border-emerald-500 cursor-pointer">
            <img src="https://ui-avatars.com/api/?name=Admin" class="w-10 h-10 rounded-full">
            <div>
                <p class="font-medium">Admin Masjid</p>
                <p class="text-sm opacity-80">admin@simasjid.com</p>
            </div>
        </div>
    </div>
</div>
