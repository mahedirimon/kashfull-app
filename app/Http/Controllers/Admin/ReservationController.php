<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Notifications\ReservationConfirmed;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Notification;

class ReservationController extends Controller
{
   public function index()
   {
        $reservations = Reservation::all();
        return view('admin.reservation.index',compact('reservations'));
   }

   public function status($id)
   {
    $reservation = Reservation::find($id);
    $reservation->status = true;
    $reservation->save();


    Notification::route('mail', $reservation->email)->notify(new ReservationConfirmed());

    return redirect()->back();
   }

   public function destroy($id)
   {
     Reservation::find($id)->delete();
     return redirect()->back();
   }
}
