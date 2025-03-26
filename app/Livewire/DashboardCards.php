<?php

namespace App\Livewire;

use App\Models\RiwayatPemberianZakat;
use App\Models\RiwayatPenerimaanZakat;
use Livewire\Component;

class DashboardCards extends Component
{
    public $zakatIncome = 0;
    public $zakatIncomePerson = 0;
    public $zakatOutcome = 0;
    public $zakatOutcomePerson = 0;
    public $zakatDelivered = 0;


    public function mount()
    {
        $this->zakatIncome = RiwayatPemberianZakat::sum('jumlah');
        $this->zakatIncomePerson = RiwayatPemberianZakat::count();
        $this->zakatOutcome = RiwayatPenerimaanZakat::sum('jumlah');
        $this->zakatOutcomePerson = RiwayatPenerimaanZakat::count();
        $this->zakatDelivered = RiwayatPenerimaanZakat::where('tahun', date('Y'))->where('status', 'done')->count();
    }

    public function render()
    {
        return view('livewire.dashboard-cards');
    }
}
