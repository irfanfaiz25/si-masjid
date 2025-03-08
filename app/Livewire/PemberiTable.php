<?php

namespace App\Livewire;

use Livewire\Component;

class PemberiTable extends Component
{
    public $showModal = false;
    public $isEditMode = false;
    public $ingredientId = null;


    public function handleOpenModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.pemberi-table');
    }
}
