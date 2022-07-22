<?php

namespace App\Http\Livewire\Components\Mysql;

ini_set('max_execution_time', 300);

use App\Mail\TicketMail;
use App\Models\Mysql\Booking;
use App\Models\Mysql\Ticket as MysqlTicket;
use App\Models\Ticket;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class ModalAccept extends ModalComponent
{
    public $booking;
    public $message;

    public function render()
    {
        return view('livewire.components.mysql.modal-accept');
    }

    public function mount($id)
    {
        $this->booking = Booking::find($id);
    }
    public function submit()
    {
    DB::transaction(function () {
        if ($this->booking->booking_status == "Terverifikasi") return $this->closeModal();

        $totalTicketP1 = Ticket::count();
        $total = MysqlTicket::get()->count() + $totalTicketP1;

        $this->booking->update([
            "booking_status" => "Terverifikasi"
        ]);

        for ($i = 1; $i <= $this->booking->ticket_total; $i++) {
            $uniqueId = $this->makeid($total + $i);
            $barcode = "https://bwipjs-api.metafloor.com/?bcid=code128&text=$uniqueId&scale=3";
            $password = substr(str_shuffle(str_repeat($x = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(5 / strlen($x)))), 1, 5);
            $name = $this->booking->name;
            $filename = $uniqueId . '_' . $this->booking->name . '.pdf';
            $total = $this->booking->ticket_total;
            $logo = asset('img/logo.png');
            $ticket_type = $this->booking->ticket_type;
            $date = Carbon::parse($this->booking->created_at)->format('d/m/Y H:i:s');



            $pdf = Pdf::loadView('vendor.pdf', compact(['uniqueId', 'barcode', 'password', 'name', 'i', 'total', 'ticket_type','date']))->save("storage/tickets/$filename");

            MysqlTicket::create([
                "uniqueId" => $uniqueId,
                "barcode" => $barcode,
                "password" => $password,
                "booking_id" => $this->booking->id,
                "ticket_file" => "/storage/tickets/$filename",
                "status" => "BELUM_DIAMBIL",
            ]);
        }
    });
        if($this->booking->ticket_total > 4){
            $tickets = $this->booking->ticket;
            $queue1 = $tickets->shift(4);

            Mail::to($this->booking->email)->send(new TicketMail($this->booking->name, $queue1));
            Mail::to($this->booking->email)->send(new TicketMail($this->booking->name, $tickets));
        }else{
            Mail::to($this->booking->email)->send(new TicketMail($this->booking->name, $this->booking->ticket));
        }

        $this->closeModal();
        return Redirect::back();
    }

    public function makeid($ticketCount)
    {
        $middle = date('YmdHis');
        $last = $ticketCount >= 0 && $ticketCount < 9 ? "000$ticketCount" : ($ticketCount >= 10 && $ticketCount < 99 ? "00$ticketCount" : ($ticketCount >= 100 && $ticketCount < 999 ? "0$ticketCount" : $ticketCount));

        return '743'.$middle.$last;
    }
}
