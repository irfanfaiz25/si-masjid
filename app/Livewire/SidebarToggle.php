<?php

namespace App\Livewire;

use Livewire\Component;

class SidebarToggle extends Component
{
    public $isSidebarVisible = false;
    public $sidebarMenu = [
        [
            'name' => 'dashboard',
            'route' => 'dashboard.index',
            'icon' => 'fa-solid fa-house',
            'request' => 'dashboard*'
        ],
        [
            'name' => 'Zakat',
            'icon' => 'fa-solid fa-hand-holding-dollar',
            'request' => 'zakat*',
            'dropdown' => [
                [
                    'name' => 'Dashboard',
                    'route' => 'dashboard-zakat.index',
                    'icon' => 'fa-solid fa-layer-group',
                    'request' => 'zakat/dashboard*',
                ],
                [
                    'name' => 'Scan Label Zakat',
                    'route' => 'scan-zakat.index',
                    'icon' => 'fa-solid fa-qrcode',
                    'request' => 'zakat/scan*',
                ],
                [
                    'name' => 'Data Pemberi',
                    'route' => 'pemberi.index',
                    'icon' => 'fa-solid fa-layer-group',
                    'request' => 'zakat/pemberi*',
                ],
                [
                    'name' => 'Data Penerima',
                    'route' => 'penerima.index',
                    'icon' => 'fa-solid fa-layer-group',
                    'request' => 'zakat/penerima*',
                ],
            ]
        ],
    ];

    public function toggleSidebar()
    {
        $this->isSidebarVisible = !$this->isSidebarVisible;
    }

    public function render()
    {
        return view('livewire.sidebar-toggle');
    }
}
