<?php

namespace App\Livewire;

use App\Models\PenerimaZakat;
use App\Models\RiwayatPenerimaanZakat;
use Livewire\Component;
use Livewire\WithPagination;
use Masmerise\Toaster\Toaster;

class PenerimaDashboard extends Component
{
    use WithPagination;


    public $showModal = false;
    public $isEditMode = false;
    public $editId;
    public $searchPenerima = '';
    public $selectedPenerima;
    public $jumlah = 3.5;
    public $tahun;
    public $search;

    public $showDeleteConfirmationModal = false;
    public $deleteData;


    public function mount()
    {
        $this->tahun = date('Y');
    }

    public function handleOpenModal()
    {
        $this->showModal = true;
    }

    public function handleCloseModal()
    {
        $this->searchPenerima = '';
        $this->jumlah = 3.5;
        $this->tahun = date('Y');
        $this->selectedPenerima = null;
        $this->isEditMode = false;
        $this->editId = null;
        $this->showModal = false;
    }

    public function handleEdit($id)
    {
        $this->isEditMode = true;
        $this->editId = $id;

        $penerimaan = RiwayatPenerimaanZakat::find($id);
        $penerima = PenerimaZakat::find($penerimaan->penerima_zakat_id);

        $this->selectedPenerima = $penerima;
        $this->jumlah = $penerimaan->jumlah;

        $this->showModal = true;
    }

    public function handleOpenConfirmationModal($id)
    {
        $data = RiwayatPenerimaanZakat::with('penerima')->find($id)->toArray();
        $this->deleteData = $data;
        $this->showDeleteConfirmationModal = true;
    }

    public function handleCloseConfirmationModal()
    {
        $this->deleteData = null;
        $this->showDeleteConfirmationModal = false;
    }

    public function selectPenerima($id)
    {
        $penerima = PenerimaZakat::find($id)->toArray();

        $this->selectedPenerima = $penerima;
    }

    public function deselectPenerima()
    {
        $this->searchPenerima = '';
        $this->selectedPenerima = null;
    }

    public function save()
    {
        $this->validate([
            'jumlah' => 'required',
            'tahun' => 'required'
        ]);

        if ($this->isEditMode) {
            $data = RiwayatPenerimaanZakat::find($this->editId);
            $data->update([
                'penerima_zakat_id' => $this->selectedPenerima['id'],
                'jumlah' => $this->jumlah,
                'tahun' => $this->tahun,
            ]);
        } else {
            $penerimaan = RiwayatPenerimaanZakat::where('penerima_zakat_id', $this->selectedPenerima['id'])->where('tahun', date('Y'))->exists();
            if ($penerimaan) {
                Toaster::error('Data pendaftar untuk tahun ini sudah ada');
                return;
            }

            RiwayatPenerimaanZakat::create([
                'penerima_zakat_id' => $this->selectedPenerima['id'],
                'jumlah' => $this->jumlah,
                'tahun' => $this->tahun,
                'status' => 'on_process'
            ]);
        }

        $message = $this->isEditMode ? 'Data berhasil diperbarui' : 'Data berhasil ditambahkan';

        $this->handleCloseModal();

        Toaster::success($message);
    }

    public function delete()
    {
        $data = RiwayatPenerimaanZakat::find($this->deleteData['id']);
        $data->delete();

        Toaster::success('Data berhasil dihapus');
        $this->handleCloseConfirmationModal();
    }

    public function render()
    {
        $penerima = PenerimaZakat::where('nama', 'like', "%$this->searchPenerima%")->get()->toArray();
        $penerimaanZakat = RiwayatPenerimaanZakat::with('penerima')->where('tahun', date('Y'))->whereHas('penerima', function ($query) {
            $query->where('nama', 'like', "%$this->search%");
        })->latest()->paginate(20);

        return view('livewire.penerima-dashboard', [
            'penerima' => $penerima,
            'zakat' => $penerimaanZakat,
        ]);
    }
}
