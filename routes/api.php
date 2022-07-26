<?php

use App\Http\Controllers\Api\TicketingController;
use App\Mail\RegisterMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('ticketing', TicketingController::class);


Route::post("/sendTicket",[TicketingController::class, 'sendTicket']);
Route::post("/checkTicket",[TicketingController::class, 'checkTicket']);

Route::post('/scan-tiket' ,[TicketingController::class, 'cekTicket']);
Route::post('/scan-tiket/2' ,[TicketingController::class, 'cekTicketP1']);

Route::post('registerApi', function(Request $request){
    $email = $request->email;
    $name = $request->name;

    Mail::to($email)->send(new RegisterMail($name));

    return response()->json([
        'success' => true,
    ]);
});


