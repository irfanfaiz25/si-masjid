<div x-data="{ isSidebarVisible: @entangle('isSidebarVisible') }">
    <!-- Toggle Button -->
    <button @click="isSidebarVisible = !isSidebarVisible" class="lg:hidden p-2 fixed top-4 left-4 z-50 dark:text-gray-50">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Overlay -->
    <div x-show="isSidebarVisible" @click="isSidebarVisible = false"
        class="fixed inset-0 bg-black bg-opacity-50 z-30 lg:hidden"></div>

    <!-- Sidebar -->
    <div :class="isSidebarVisible ? 'translate-x-0' : '-translate-x-full'"
        class="bg-[#FAFAFA] dark:bg-[#1c1c1c] fixed top-0 left-0 min-h-screen w-72 duration-500 px-3 z-40 pt-20 lg:pt-10 transform lg:translate-x-0">
        <div class="flex items-center mt-2">
            <img src="{{ asset('storage/img/si-masjid.png') }}" alt="logo" class="h-10 ml-2" />
            <h1 class="text-gray-800 dark:text-gray-50 font-semibold text-xl ml-2 font-sans">
                Si-<span class="text-emerald-500">Masjid</span>
            </h1>
        </div>
        <div class="mt-10 flex flex-col gap-2 relative text-gray-800 dark:text-gray-50">
            @foreach ($sidebarMenu as $menu)
                @if (isset($menu['dropdown']))
                    <div x-data="{ isOpen: false }" class="group">
                        <button @click="isOpen = !isOpen"
                            class="w-full flex items-center text-sm h-11 gap-3.5 font-medium p-2 pl-5 hover:bg-emerald-100 {{ request()->is($menu['request']) ? 'bg-emerald-100 border border-emerald-500' : 'text-gray-800 dark:text-gray-50 hover:border border-gray-50 hover:border-emerald-500' }} rounded-md group transition-all duration-300 cursor-pointer">
                            <i class="{{ $menu['icon'] }} text-lg group-hover:scale-105"></i>
                            <h2 class="whitespace-pre duration-300 capitalize">{{ $menu['name'] }}</h2>
                            <i class="fa fa-chevron-down ml-auto transition-transform duration-300"
                                :class="{ 'rotate-180': isOpen }"></i>
                        </button>
                        <div x-show="isOpen" class="pl-12 pt-1 space-y-1">
                            @foreach ($menu['dropdown'] as $submenu)
                                <a href="{{ route($submenu['route']) }}"
                                    {{ $submenu['route'] !== 'scan-zakat.index' ? 'wire:navigate' : '' }}
                                    class="flex items-center text-sm h-11 gap-3.5 font-medium p-2 hover:bg-emerald-100 rounded-md group transition-all duration-300 {{ request()->is($submenu['request']) ? 'bg-emerald-100 border  border-emerald-500' : 'text-gray-800 dark:text-gray-50 hover:border border-gray-50 hover:border-emerald-500' }}">
                                    <i class="{{ $submenu['icon'] }} text-lg group-hover:scale-105"></i>
                                    <h2 class="whitespace-pre duration-300 capitalize">{{ $submenu['name'] }}</h2>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @else
                    <a href="{{ route($menu['route']) }}" wire:navigate
                        class="group flex items-center text-sm h-11 gap-3.5 font-medium p-2 pl-5 hover:bg-emerald-100 rounded-md group transition-all duration-300 {{ request()->is($menu['request']) ? 'bg-emerald-100 border border-emerald-500' : 'text-gray-800 dark:text-gray-50 hover:border border-gray-50 hover:border-emerald-500' }}">
                        <i class="{{ $menu['icon'] }} text-lg"></i>
                        <h2 class="whitespace-pre duration-300 capitalize">{{ $menu['name'] }}</h2>
                    </a>
                @endif
            @endforeach
        </div>
    </div>
</div>
