<?php

namespace App\Livewire;

use App\Models\PenerimaZakat;
use Livewire\Component;
use Livewire\WithPagination;
use Masmerise\Toaster\Toaster;

class PenerimaTable extends Component
{
    use WithPagination;

    public $showModal = false;

    public $search = '';
    public $isEditMode = false;
    public $editId;

    public $showDeleteConfirmationModal = false;
    public $deleteId;
    public $deleteName;

    public $nama = '';
    public $alamat = '';


    public function handleOpenModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->nama = '';
        $this->alamat = '';
        $this->editId = '';
        $this->isEditMode = false;
        $this->showModal = false;
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function handleEdit($id)
    {
        $this->isEditMode = true;
        $this->editId = $id;
        $this->showModal = true;

        $data = PenerimaZakat::find($id);
        $this->nama = $data->nama;
        $this->alamat = $data->alamat;
    }

    public function handleOpenConfirmationModal($id)
    {
        $data = PenerimaZakat::find($id);
        $this->deleteId = $id;
        $this->deleteName = $data->nama;

        $this->showDeleteConfirmationModal = true;
    }

    public function handleCloseConfirmationModal()
    {
        $this->deleteId = '';
        $this->deleteName = '';

        $this->showDeleteConfirmationModal = false;
    }

    public function save()
    {
        $this->validate([
            'nama' => 'required|string|max:100|unique:penerima_zakats,nama,' . $this->editId,
            'alamat' => 'required|string'
        ]);

        if ($this->isEditMode) {
            $data = PenerimaZakat::find($this->editId);
            $data->update([
                'nama' => $this->nama,
                'alamat' => $this->alamat,
            ]);
        } else {
            PenerimaZakat::create([
                'nama' => $this->nama,
                'alamat' => $this->alamat,
            ]);
        }

        $message = $this->isEditMode ? 'Data berhasil diperbarui' : 'Data berhasil ditambahkan';

        $this->closeModal();

        Toaster::success($message);
    }

    public function handleDelete()
    {
        $data = PenerimaZakat::find($this->deleteId);
        $data->delete();

        $this->reset(['deleteId', 'deleteName']);
        $this->showDeleteConfirmationModal = false;

        Toaster::success('Data berhasil dihapus');
    }

    public function render()
    {
        $penerima = PenerimaZakat::where('nama', 'like', "%$this->search%")->latest()->paginate(10);
        return view('livewire.penerima-table', [
            'penerima' => $penerima,
        ]);
    }
}
