<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\RiwayatPenerimaanZakat;
use Masmerise\Toaster\Toaster;

class LabelScanner extends Component
{
    public $search = '';
    public $filter = 'all';
    public $qrCodeData = '';


    public function updatedQrCodeData()
    {
        $data = RiwayatPenerimaanZakat::whereHas('penerima', function ($query) {
            $query->where('nama', $this->qrCodeData);
        })->first();

        if (!$data) {
            Toaster::error('Data penerima tidak ditemukan');
            return;
        }

        if ($data->status === 'done') {
            Toaster::error('Data penerima sudah di update');
            return;
        }

        $data->status = 'done';
        $data->save();

        Toaster::success('Data penerima berhasil di update');

        $this->qrCodeData = '';
    }

    public function handleChangeFilter($filter)
    {
        $this->filter = $filter;
    }

    public function searchByQrCode()
    {
        dd($this->qrCodeData);
        if (!empty($this->qrCodeData)) {
            $this->search = $this->qrCodeData;
        }
    }

    public function render()
    {
        $query = RiwayatPenerimaanZakat::with('penerima')
            ->where('tahun', date('Y'))
            ->whereHas('penerima', function ($query) {
                $query->where('nama', 'like', '%' . $this->search . '%');
            });

        if ($this->filter === 'done') {
            $query->where('status', 'done');
        } elseif ($this->filter === 'on_process') {
            $query->where('status', 'on_process');
        }

        $data = $query->latest()->get();

        return view('livewire.label-scanner', [
            'penerima' => $data
        ]);
    }
}
