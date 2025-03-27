<?php

namespace App\Livewire;

use App\Models\PemberiZakat;
use App\Models\RiwayatPemberianZakat;
use Livewire\Component;
use Livewire\WithPagination;
use Masmerise\Toaster\Toaster;

class PemberiDashboard extends Component
{
    use WithPagination;


    public $showModal = false;
    public $isEditMode = false;
    public $editId;
    public $searchPemberi = '';
    public $selectedPemberi;
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
        $this->searchPemberi = '';
        $this->jumlah = 3.5;
        $this->tahun = date('Y');
        $this->selectedPemberi = null;
        $this->isEditMode = false;
        $this->editId = null;
        $this->showModal = false;
    }

    public function handleEdit($id)
    {
        $this->isEditMode = true;
        $this->editId = $id;

        $pemberian = RiwayatPemberianZakat::find($id);
        $pemberi = PemberiZakat::find($pemberian->pemberi_zakat_id);

        $this->selectedPemberi = $pemberi;
        $this->jumlah = $pemberian->jumlah;

        $this->showModal = true;
    }

    public function handleOpenConfirmationModal($id)
    {
        $data = RiwayatPemberianZakat::with('pemberi')->find($id)->toArray();
        $this->deleteData = $data;
        $this->showDeleteConfirmationModal = true;
    }

    public function handleCloseConfirmationModal()
    {
        $this->deleteData = null;
        $this->showDeleteConfirmationModal = false;
    }

    public function selectPemberi($id)
    {
        $pemberi = PemberiZakat::find($id)->toArray();

        $this->selectedPemberi = $pemberi;
    }

    public function deselectPemberi()
    {
        $this->searchPemberi = '';
        $this->selectedPemberi = null;
    }

    public function save()
    {
        $this->validate([
            'jumlah' => 'required',
            'tahun' => 'required'
        ]);

        if ($this->isEditMode) {
            $data = RiwayatPemberianZakat::find($this->editId);
            $data->update([
                'pemberi_zakat_id' => $this->selectedPemberi['id'],
                'jumlah' => $this->jumlah,
                'tahun' => $this->tahun,
            ]);
        } else {
            if (!$this->selectedPemberi) {
                Toaster::error('Anda belum memilih pendaftar zakat');
                return;
            }

            $pemberian = RiwayatPemberianZakat::where('pemberi_zakat_id', $this->selectedPemberi['id'])->where('tahun', date('Y'))->exists();
            if ($pemberian) {
                Toaster::error('Data pendaftar untuk tahun ini sudah ada');
                return;
            }

            RiwayatPemberianZakat::create([
                'pemberi_zakat_id' => $this->selectedPemberi['id'],
                'jumlah' => $this->jumlah,
                'tahun' => $this->tahun,
            ]);
        }

        $message = $this->isEditMode ? 'Data berhasil diperbarui' : 'Data berhasil ditambahkan';

        $this->handleCloseModal();

        Toaster::success($message);
    }

    public function delete()
    {
        $data = RiwayatPemberianZakat::find($this->deleteData['id']);
        $data->delete();

        Toaster::success('Data berhasil dihapus');
        $this->handleCloseConfirmationModal();
    }

    public function render()
    {
        $pemberi = PemberiZakat::where('nama', 'like', "%$this->searchPemberi%")->get()->toArray();
        $pemberianZakat = RiwayatPemberianZakat::with('pemberi')->where('tahun', date('Y'))->whereHas('pemberi', function ($query) {
            $query->where('nama', 'like', "%$this->search%");
        })->latest()->paginate(20);

        return view('livewire.pemberi-dashboard', [
            'pemberi' => $pemberi,
            'zakat' => $pemberianZakat,
        ]);
    }
}
