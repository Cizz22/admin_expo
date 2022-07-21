<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class ModalPembayaran extends ModalComponent
{
    public $payment;
    public $booking_id;
    public $total_ticket;

    public function render()
    {
        return view('livewire.components.modal-pembayaran');
    }

    public function mount($payment, $id, $total){
        $this->payment = $payment;
        $this->booking_id = $id;
        $this->total_ticket = $total;
    }
}
