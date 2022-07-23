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

    public function sendEmailp1(Request $request){
        $booking = Booking::where('email', $request->email)->first();
        if ($booking->ticket_total > 4) {
            $tickets = $booking->ticket;
            $queue1 = $tickets->shift(4);

            Mail::to($booking->email)->send(new TicketMail($booking->name, $queue1));
            Mail::to($booking->email)->send(new TicketMail($booking->name, $tickets));
        } else {
            $tickets = ModelsTicket::where('booking', $booking->_id)->get();
            dd($tickets);
            Mail::to($booking->email)->send(new TicketMail($booking->name, $booking->ticket));
        }

        response()->json([
            "success"=>true,
        ],200);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Mail::to("cisatraa@gmail.com")->send(new RegisterMail("aulia cisatra"));

        return response()->json([
            "success" => false,
            "message" => "closed"
        ]);

        $validator = Validator::make($request->all(), [
            'payment_proof' => 'required|mimes:png,jpg,jpeg|max:2048',
            'name' => 'required',
            'email' => 'required|email|unique:bookings,email',
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
                    'ticket_type' => "Presale 2"
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
