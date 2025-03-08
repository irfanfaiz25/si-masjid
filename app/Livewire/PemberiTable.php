<?php

namespace App\Livewire;

use App\Models\PemberiZakat;
use Livewire\Component;
use Livewire\WithPagination;
use Masmerise\Toaster\Toaster;

class PemberiTable extends Component
{
    use WithPagination;

    public $search = '';
    public $isEditMode = false;
    public $editId;

    public $nama = '';


    // public function handleOpenModal()
    // {
    //     $this->showModal = true;
    // }

    // public function closeModal()
    // {
    //     $this->nama = '';

    //     $this->showModal = false;
    // }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function handleEdit($id)
    {
        $this->isEditMode = true;
        $this->editId = $id;

        $data = PemberiZakat::find($id);
        $this->nama = $data->nama;
    }

    public function handleCancelEdit()
    {
        $this->nama = '';
        $this->editId = '';
        $this->isEditMode = false;
    }

    public function save()
    {
        $this->validate([
            'nama' => 'required|string|max:100|unique:pemberi_zakats,nama,' . $this->editId,
        ]);

        if ($this->isEditMode) {
            $data = PemberiZakat::find($this->editId);
            $data->update([
                'nama' => $this->nama,
            ]);
        } else {
            PemberiZakat::create([
                'nama' => $this->nama,
            ]);
        }

        $message = $this->isEditMode ? 'Data berhasil diperbarui' : 'Data berhasil ditambahkan';

        $this->nama = '';
        $this->editId = '';
        $this->isEditMode = false;

        Toaster::success($message);
    }

    public function render()
    {
        $pemberi = PemberiZakat::where('nama', 'like', "%$this->search%")->latest()->paginate(10);
        return view('livewire.pemberi-table', [
            'pemberi' => $pemberi,
        ]);
    }
}
