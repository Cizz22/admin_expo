<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\RegisterMail;
use App\Mail\TicketMail;
use App\Models\Booking;
use App\Models\Mysql\Booking as MysqlBooking;
use App\Models\Mysql\Ticket;
use App\Models\Ticket as ModelsTicket;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Intervention\Image\ImageManager;

class TicketingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MysqlBooking::all();

        return response()->json([
            "success" => true,
            "message" => "All Ticket Booking Data",
            "data" => $data
        ], 200);
    }

    public function checkTicket(Request $request)
    {
        $booking = MysqlBooking::where('email', $request->email)->first();
        if (!$booking) {
            return response()->json([
                "success" => false,
                "message" => "Booking not found"
            ]);
        }

        if ($booking->ticket->isEmpty()) {
            return response()->json([
                "success" => false,
                "message" => "Booking not verified"
            ]);
        }

        return  response()->json([
            "success" => true,
            "message" =>  "Ticket Ready"
        ], 200);
    }

    public function sendTicket(Request $request)
    {
        $booking = MysqlBooking::where('email', $request->email)->first();

        if ($booking->ticket_total > 4) {
            $tickets = $booking->ticket;
            $queue1 = $tickets->shift(4);

            Mail::to($booking->email)->send(new TicketMail($booking->name, $queue1));
            Mail::to($booking->email)->send(new TicketMail($booking->name, $tickets));
        } else {
            Mail::to($booking->email)->send(new TicketMail($booking->name, $booking->ticket));
        }

        return  response()->json([
            "success" => true,
            "message" =>  "Resend Ticket Success",
            "data" => $booking->ticket
        ], 200);
    }

    public function cekTicket(Request $request){
        $ticket = Ticket::where('uniqueId', $request->uniqueId)->first();

        if(!$ticket){
            return response()->json([
                "success" => false,
                "message" => "Ticket Not Found"
            ]);
        }

        if($ticket->status == 'DIAMBIL') {
            return response()->json([
                "success" => false,
                "message" => "Ticket has been redeemed"
            ]);
        }

        $data = $ticket->update([
            'status' => 'DIAMBIL'
        ]);

        return response()->json([
            "success" => true,
            "message" => "Ticket successfully redeemed",
            "data" => $data
        ]);
    }

    public function cekTicketP1(Request $request){

        $ticket = ModelsTicket::where('uniqueId', $request->uniqueId)->first();


        if(!$ticket){
            return response()->json([
                "success" => true,
                "message" => "Ticket Not Found"
            ]);
        }

        return response()->json($ticket['status']);

        if($ticket->status == 'DIAMBIL') {
            return response()->json([
                "success" => true,
                "message" => "Ticket has been redeemed"
            ]);
        }


        $data = $ticket->update([
            'status' => 'DIAMBIL'
        ]);

        return response()->json([
            "success" => true,
            "message" => "Ticket has been redeemed",
            "data" => $ticket->booking
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'payment_proof' => 'required|mimes:png,jpg,jpeg|max:2048',
            'name' => 'required',
            'email' => Rule::unique('bookings')->where(fn ($query) => $query->where('ticket_type', 'OTS')),
            'whatsapp' => 'required',
            'payment_no' => 'required',
            'payment_method' => 'required',
            'ticket_total' => 'required',
            'payment_total' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        try {

            if ($request->file('payment_proof')) {
                $name = date('YmdHis') . '_' . $request->name . '_PaymentProof.' . $request->file('payment_proof')->getClientOriginalExtension();

                $resized = (new ImageManager())
                    ->make($request->file('payment_proof'))
                    ->resize(600, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })->encode($request->file('payment_proof')->getClientOriginalExtension());

                Storage::disk('public')
                    ->put('uploads/' . $name, $resized->__toString());

                $newBook = MysqlBooking::create([
                    'payment_proof' => 'uploads/' . $name,
                    'name' => $request->name,
                    'email' => $request->email,
                    'whatsapp' => $request->whatsapp,
                    'payment_no' => $request->payment_no,
                    'payment_method' => $request->payment_method,
                    'ticket_total' => $request->ticket_total,
                    'ticket_type' => $request->ticket_type,
                    'payment_total' => $request->payment_total,
                    'ticket_type' => "OTS",
                    'code_ref' => $request->code_ref
                ]);


                return response()->json([
                    'success' => true,
                    'message' => 'Register Successfully',
                    'data' => $newBook
                ], 201);
            }
        } catch (QueryException $e) {
            return response()->json([
                'success' => false,
                'error' => $e
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
