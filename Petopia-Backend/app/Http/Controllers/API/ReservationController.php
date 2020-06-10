<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Reservation;
use App\User;
use App\Pet;
use App\Service;
use App\Http\Requests\ReservationRequest;

class ReservationController extends Controller
{
    /**
     * STORE NEW RESERVATION FROM CLIENT 
     * @param ReservationRequest $request
     * @return response JSON
    */
    public function store(ReservationRequest $request)
    {
        $isExists = Reservation::where('user_id',User::where('name',$request->client_name)->pluck('id')->first())
            ->where('pet_id',Pet::where('name',$request->pet_name)->pluck('id')->first())
            ->where('service_id',Service::where('name',$request->service_name)->pluck('id')->first())
            ->where('date',$request->date)->exists();   
               
        if ($isExists) 
        {
            return response()->json(['status' => 'error','message' => 'You already have a reservation']);
        }  

        $reservation = new Reservation();
        $reservation->user_id = User::where('name',$request->client_name)->pluck('id')->first();
        $reservation->pet_id = Pet::where('name',$request->pet_name)->pluck('id')->first();
        $reservation->service_id = Service::where('name',$request->service_name)->pluck('id')->first();
        $reservation->date = $request->date;
        $reservation->save();

        return response()->json(['reservation_id' => $reservation->id ,'status' => 'success' ]);
    }

    public function destroy($id)
    {
        // dd($id);
        if(Reservation::find($id)->delete())
        {
            return response()->json([
                'status' => 'success',
                'message'=> 'Reservation Cancled'
            ]);
        }
        else
        {
            return response()->json([
                'message' => 'Error, failed to cancel reservation'
            ]);
        }

        // $reservation = Reservation::find($id);
        // $reservation->delete();

        // return response()->json([
        //     'status' => 'success',
        //     'message' => 'Reservation canceled'
        // ]);
    }
}
