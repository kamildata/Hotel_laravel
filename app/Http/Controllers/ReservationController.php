<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Guest;
use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use \DateTime;
use Illuminate\Support\Facades\Lang;
class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // return view('reservation',[
        //     'reservations'=>Reservation::all(),
        // ]);

        $paginationSize = 25;
        $paginationSize = $request->pagesize;

        $query = Reservation::select("*");

        $reservation = $query->paginate($paginationSize);

        return view('reservation',[
            'reservations'=> $reservation
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('reservations.addReservation', [
            'rooms' => Room::all(),
            'guests' => Guest::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReservationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReservationRequest $request)
    {
        $validated = $request->validate([
            'status' => ['required'],
            'room_id' => ['required'],
            'guest_id' => ['required'],
            'data_rozpoczecia' => ['required'],
            'data_zakonczenia' => ['required', 'max:255'],
        ]);

        $input = $request->all();

        $data_roz = $input['data_rozpoczecia'];
        $data_zak = $input['data_zakonczenia'];

        $input['data_rozpoczecia'] = $data_roz. " 00:00:00";
        $input['data_zakonczenia'] = $data_zak. " 00:00:00";
        $X = new DateTime($data_roz);
        $Y = new DateTime($data_zak);

        $now = new DateTime((new DateTime())->format('Y-m-d 00:00:00'));

        if($X < $now){
            return redirect()->route("reservations.create")->with('error', Lang::get('auth.cantDoReservationInPast'));
        }

        if($X > $Y){
            return redirect()->route("reservations.create")->with('error', Lang::get('auth.weirdDate'));
        }

        $query = Reservation::select('*')->where('room_id','LIKE',$input['room_id'])->get();

        $mozeZarezerowowac = true;
        foreach ($query as &$rezerwacja) {
            $A = new DateTime($rezerwacja->data_rozpoczecia);
            $B = new DateTime($rezerwacja->data_zakonczenia);

            //sprawdzanie czy mozna wynająć dany pokój check czy nie jest juz zarezerwowany
            if($X <= $B && $X >= $A  || $A  <= $Y && $A  >= $X)
            {
                $mozeZarezerowowac = false;
            }
        }

        if($mozeZarezerowowac){
            Reservation::create($input);
            return redirect()->route("reservations.index");
        }

        return redirect()->route("reservations.create")->with('error', Lang::get('auth.cantDoReservation'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
        return view('reservations.showReservation',[
            'reservation' => $reservation
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
        // return view('reservations.editReservation',[
        //     'reservation' => $reservation
        // ]);
        return view('reservations.editReservation', [
            'reservation' => $reservation,
            'rooms' => Room::all(),
            'guests' => Guest::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReservationRequest  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        //
        $validated = $request->validate([
            'status' => ['required', 'max:255'],
            'room_id' => ['required', 'max:255'],
            'guest_id' => ['required', 'max:255'],
            'data_rozpoczecia' => ['required', 'max:255'],
            'data_zakonczenia' => ['required', 'max:255'],
        ]);

        $input = $request->all();

        $data_roz = $input['data_rozpoczecia'];
        $data_zak = $input['data_zakonczenia'];

        $input['data_rozpoczecia'] = $data_roz. " 00:00:00";
        $input['data_zakonczenia'] = $data_zak. " 00:00:00";
        $X = new DateTime($data_roz);
        $Y = new DateTime($data_zak);

        $now = new DateTime((new DateTime())->format('Y-m-d 00:00:00'));


        if($X < $now){
            return redirect()->route("reservations.create")->with('error', Lang::get('auth.cantDoReservationInPast'));
        }

        if($X > $Y){
            return redirect()->route("reservations.create")->with('error', Lang::get('auth.weirdDate'));
        }

        $query = Reservation::select('*')->where('room_id','LIKE',$input['room_id'])->get();

        $mozeZarezerowowac = true;
        foreach ($query as &$rezerwacja) {
            $A = new DateTime($rezerwacja->data_rozpoczecia);
            $B = new DateTime($rezerwacja->data_zakonczenia);

            //sprawdzanie czy mozna wynająć dany pokój check czy nie jest juz zarezerwowany
            if($X <= $B && $X >= $A  || $A  <= $Y && $A  >= $X)
            {
                $mozeZarezerowowac = false;
            }
        }

        if($mozeZarezerowowac){
            //Reservation::create($input);
            $reservation->update($input);
            return redirect()->route("reservations.index");
        }

        return redirect()->route("reservations.create")->with('error', Lang::get('auth.cantDoReservation'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route("reservations.index");
    }
}
