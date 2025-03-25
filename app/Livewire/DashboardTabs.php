<?php

namespace App\Livewire;

use Livewire\Component;

class DashboardTabs extends Component
{
    public $currentTab = 'monitoring';


    public function handleChangeTabs($tab)
    {
        $this->currentTab = $tab;
    }

    public function render()
    {
        return view('livewire.dashboard-tabs');
    }
}
