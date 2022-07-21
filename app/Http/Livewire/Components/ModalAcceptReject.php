<?php

namespace App\Http\Livewire\Components;

use App\Mail\TicketMail;
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

    public function render()
    {
        return view('livewire.components.modal-accept-reject');
    }

    public function mount($id, $total)
    {

        $this->booking = Http::get("https://server.tesdeveloper.me/v1/ticketing/getTicketbyId/$id")->json()['data'];
        $this->total = $total;
    }

    public function submit()
    {
        $this->totalTicket = Http::get('https://server.tesdeveloper.me/v1/ticketing/total')->json()['data'];
        $collect = collect();
        $tickets = [];

        for ($i = 1; $i <= $this->total; $i++) {
            $uniqueId = $this->makeid($this->totalTicket + $i);
            $barcode = "https://bwipjs-api.metafloor.com/?bcid=code128&text=$uniqueId&scale=3";
            $password = substr(str_shuffle(str_repeat($x = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(5 / strlen($x)))), 1, 5);
            $name = $this->booking['name'];
            $filename = $uniqueId . '_' . $name . '.pdf';
            $total = $this->total;
            $logo = asset('img/logo.png');

            $pdf = Pdf::loadView('vendor.pdf', compact(['uniqueId', 'barcode', 'password', 'name', 'i', 'total', 'logo']))->save("storage/tickets/$filename");

            array_push($tickets, "/storage/tickets/$filename");
            $collect->push([
                "uniqueId" => $uniqueId,
                "barcode" => $barcode,
                "password" => $password,
                "booking" => $this->booking['id'],
                "ticket_file" => "/storage/tickets/$filename"
            ]);
        }


        $res = Http::post("https://server.tesdeveloper.me/v1/ticketing/verification", [
            "booking_id" => $this->booking['id'],
            "status" => "accept",
            "ticket_data" => $collect->toArray(),
        ])->json();

        if($res['success']) Mail::to($this->booking['email'])->send(new TicketMail($this->booking['name'], $tickets));

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
