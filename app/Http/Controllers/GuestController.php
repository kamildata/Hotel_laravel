<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Http\Requests\StoreGuestRequest;
use App\Http\Requests\UpdateGuestRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;

use Illuminate\Http\Request;
use Illuminate\Pagination\CursorPaginator;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $paginationSize = 20;
        $paginationSize = $request->pagesize;

        $query = Guest::select("*");

        $guest = $query->paginate($paginationSize);

        return view('guests',[
            'guests'=> $guest
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
        return view('createGuest');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGuestRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGuestRequest $request)
    {

        $validated = $request->validate([
            'imie' => ['required', 'max:64'],
            'nazwisko' => ['required', 'max:64'],
            'pesel' => ['required', 'max:11'],
            'miejscowosc' => ['required', 'max:64'],
            'ulica' => ['required', 'max:255'],
            'nr_budynku' => ['required', 'max:64'],
            'kod_pocztowy' => ['required', 'max:64'],
            'miasto' => ['required', 'max:64'],
            'kraj' => ['required', 'max:64'],
            'telefon' => ['required', 'max:64'],
            'email' => ['required', 'max:64'],
            'haslo' => ['required', 'max:64'],
        ]);
        $password = Hash::make('haslo');
        $input = $request->all();
        $input['haslo'] = $password;
        Guest::create($input);
        return redirect()->route("guests.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function show(Guest $guest)
    {
        //
        return view('guests.showGuest',[
            'guest' => $guest
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function edit(Guest $guest)
    {
        //
        return view('guests.edit',[
            'guest' => $guest
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGuestRequest  $request
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGuestRequest $request, Guest $guest)
    {
        //
        $validated = $request->validate([
            'imie' => ['required', 'max:64'],
            'nazwisko' => ['required', 'max:64'],
            'pesel' => ['required', 'max:64'],
            'miejscowosc' => ['required', 'max:64'],
            'ulica' => ['required', 'max:255'],
            'nr_budynku' => ['required', 'max:64'],
            'kod_pocztowy' => ['required', 'max:64'],
            'miasto' => ['required', 'max:64'],
            'kraj' => ['required', 'max:64'],
            'telefon' => ['required', 'max:64'],
            'email' => ['required', 'max:64'],
            // 'haslo' => ['required', 'max:64'],
        ]);
        $password = $request->get($guest->haslo);
        $password = Hash::make('haslo');
        $input = $request->all();
        $input['haslo'] = $password;

        // $input = $request->all();
        $guest->update($input);

        return redirect()->route("guests.index");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guest $guest)
    {
        //Lang::get('auth.failed'),
        try {
            $guest->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == 23000) {
                return redirect()->route("guests.show",$guest->id)->with('error', Lang::get('auth.wiezy'));
            } else {
                return redirect()->route("guests.show")->with('error', Lang::get('auth.dontknow'));
            }
        }
        $guest->delete();
        return redirect()->route("guests.index");

        // $guest->delete();
        // return redirect()->route("guests.index");
    }
}
