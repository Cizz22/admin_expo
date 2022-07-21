<?php

namespace App\Http\Livewire\Components;

use App\Mail\TicketMail;
use App\Models\Booking;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use PDF;

class ModalAcceptReject extends ModalComponent
{
    public $booking;
    protected $totalTicket;
    public $total;
    public $booking_id;
    public $email;
    protected $listeners = ['refreshComponent' => '$refresh'];

    public function render()
    {
        return view('livewire.components.modal-accept-reject');
    }

    public function mount($id, $total)
    {
        $this->booking_id = $id;
        $this->total = $total;
        $this->booking = Booking::find($this->booking_id);

    }

    public function submit()
    {
        if($this->booking->booking_status) return $this->closeModal();
        $this->totalTicket = Ticket::count();
        $this->booking->update([
            "booking_status" => true
        ]);

        $tickets = [];

        for ($i = 1; $i <= $this->total; $i++) {
            $uniqueId = $this->makeid($this->totalTicket + $i);
            $barcode = "https://bwipjs-api.metafloor.com/?bcid=code128&text=$uniqueId&scale=3";
            $password = substr(str_shuffle(str_repeat($x = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(5 / strlen($x)))), 1, 5);
            $name = $this->booking->name;
            $filename = $uniqueId . '_' . $name . '.pdf';
            $total = $this->total;
            $logo = asset('img/logo.png');
            $ticket_type = $this->booking->ticket_type;

            $pdf = Pdf::loadView('vendor.pdf', compact(['uniqueId', 'barcode', 'password', 'name', 'i', 'total', 'ticket_type']))->save("storage/tickets/$filename");

            array_push($tickets, [
                "uniqueId" => $uniqueId,
                "barcode" => $barcode,
                "password" => $password,
                "booking" => $this->booking->id,
                "ticket_file" => "/storage/tickets/$filename",
                "status" => "BELUM_DIAMBIL",
            ]);

        }

        Ticket::insert($tickets);


        Mail::to($this->booking->email)->send(new TicketMail($this->booking->name, $tickets));


        $this->emit('refreshComponent');
        $this->closeModal();
    }

    public function makeid($ticketCount)
    {
        $middle = date('YmdHis');
        $last = $ticketCount >= 0 && $ticketCount < 9 ? "000$ticketCount" : ($ticketCount >= 10 && $ticketCount < 99 ? "00$ticketCount" : ($ticketCount >= 100 && $ticketCount < 999 ? "0$$ticketCount" : $ticketCount));
        $unique = "743$middle";

        return "$unique$last";
    }
}
