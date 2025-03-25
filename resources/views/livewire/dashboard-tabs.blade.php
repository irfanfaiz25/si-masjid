<div class="mt-8 ">
    <div class="w-full flex justify-center">
        <div class="w-1/2">
            <div class="relative right-0">
                <ul class="relative flex flex-wrap px-1.5 py-1.5 list-none rounded-md bg-gray-200" data-tabs="tabs"
                    role="list">
                    <li wire:click="handleChangeTabs('pendaftar')"
                        class="z-30 flex-auto text-center transition-all duration-300 {{ $currentTab === 'pendaftar' ? 'bg-emerald-700 opacity-90 text-gray-50 rounded-md' : 'text-gray-800' }}">
                        <a class="z-30 flex items-center justify-center w-full px-0 py-2 text-sm mb-0 border-0 rounded-md cursor-pointer bg-inherit"
                            data-tab-target="" role="tab" aria-selected="true">
                            <i class="fa fa-address-card text-sm"></i>
                            <span class="ml-1">Pendaftar</span>
                        </a>
                    </li>
                    <li wire:click="handleChangeTabs('penerima')"
                        class="z-30 flex-auto text-center transition-all duration-300 {{ $currentTab === 'penerima' ? 'bg-emerald-700 opacity-90 text-gray-50 rounded-md' : 'text-gray-800' }}">
                        <a class="z-30 flex items-center justify-center w-full px-0 py-2 mb-0 text-sm border-0 rounded-md cursor-pointer bg-inherit"
                            data-tab-target="" role="tab" aria-selected="false">
                            <i class="fa fa-users-rectangle text-sm"></i>
                            <span class="ml-1">Penerima</span>
                        </a>
                    </li>
                    <li wire:click="handleChangeTabs('monitoring')"
                        class="z-30 flex-auto text-center transition-all duration-300 {{ $currentTab === 'monitoring' ? 'bg-emerald-700 opacity-90 text-gray-50 rounded-md' : 'text-gray-800' }}">
                        <a class="z-30 flex items-center justify-center w-full px-0 py-2 text-sm mb-0 border-0 rounded-md cursor-pointer bg-inherit"
                            data-tab-target="" role="tab" aria-selected="false">
                            <i class="fa fa-chart-simple text-sm"></i>
                            <span class="ml-1">Monitoring</span>
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </div>

    <div class="mt-4 w-full">
        @if ($currentTab === 'pendaftar')
            @livewire('pemberi-dashboard')
        @elseif ($currentTab === 'penerima')
            @livewire('penerima-dashboard')
        @elseif ($currentTab === 'monitoring')
            @livewire('monitor-dashboard')
        @endif
    </div>
</div>
