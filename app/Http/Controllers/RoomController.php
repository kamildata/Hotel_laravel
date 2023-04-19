<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Validation\Rule;
class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        return view('rooms',[
            'rooms'=>Room::all()
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
        return view('rooms.addRoom');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRoomRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoomRequest $request)
    {
        //
        $validated = $request->validate([
            'pietro' => ['required', 'max:2'],
            'dostepny' => ['required', 'max:2', Rule::in(["0","1"])],
            'standard' => ['required', 'max:64'],
            'liczba_miejsc' => ['required','numeric', 'max:20','min:1'],
            'cena' => ['required','numeric','min:1','max:99999'],
            'opis' => ['required', 'max:1000'],
        ]);

        $input = $request->all();
        Room::create($input);
        return redirect()->route("rooms.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
        return view('rooms.showRoom',[
            'room' => $room
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        //
        return view('rooms.editRoom',[
            'room' => $room
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoomRequest  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoomRequest $request, Room $room)
    {
        //
        $validated = $request->validate([
            'pietro' => ['required', 'max:2'],
            'dostepny' => ['required', 'max:2', Rule::in(["0","1"])],
            'standard' => ['required', 'max:64'],
            'liczba_miejsc' => ['required','numeric', 'max:20','min:1'],
            'cena' => ['required','numeric','min:1','max:99999'],
            'opis' => ['required', 'max:1000'],
        ]);
        $input = $request->all();
        $room->update($input);

        return redirect()->route("rooms.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        try {
            $room->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == 23000) {
                return redirect()->route("rooms.show",$room->id)->with('error', Lang::get('auth.wiezy2'));
            } else {
                return redirect()->route("rooms.show")->with('error', Lang::get('auth.dontknow'));
            }
        }
        $room->delete();
        return redirect()->route("rooms.index");
    }
}
