<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class ModalReject extends ModalComponent
{
    public function render()
    {
        return view('livewire.components.modal-reject');
    }
}
