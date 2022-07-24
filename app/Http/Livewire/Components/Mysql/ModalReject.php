<?php

namespace App\Http\Livewire\Components\Mysql;

use App\Models\Mysql\Booking;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class ModalReject extends ModalComponent
{
    public $booking_id;
    public function render()
    {
        return view('livewire.components.mysql.modal-reject');
    }

    public function mount($id){
        $this->booking_id = $id;
    }

    public function submit(){
        $booking = Booking::find($this->booking_id);

        $booking->delete();

        $this->closeModal();
    }
}
