<?php

namespace App\Http\Livewire\Components\Mysql;

use App\Models\Mysql\Booking;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class ModalBukti extends ModalComponent
{

    public $booking;

    public function render()
    {
        return view('livewire.components.mysql.modal-bukti');
    }

    public function mount($id){
        $this->booking = Booking::find($id);
    }
}
