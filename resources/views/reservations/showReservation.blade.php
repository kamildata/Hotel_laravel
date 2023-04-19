@extends('layouts.app')

@section('content')
<div class="container-fluid w-50 pt-5">
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><p class="fw-bold">Imię:</p>{{ $reservation->guest->imie }}</li>
        <li class="list-group-item"><p class="fw-bold">Nazwisko: </p>{{ $reservation->guest->nazwisko }}</li>
        <li class="list-group-item"><p class="fw-bold">Numer telefonu: </p>{{ $reservation->guest->telefon }}</li>
        <li class="list-group-item"><p class="fw-bold">Email: </p>{{ $reservation->guest->email }}</li>
        <li class="list-group-item"><p class="fw-bold">Numer pokoju: </p>{{ $reservation->room_id }}</li>
        <li class="list-group-item"><p class="fw-bold">Data rozpoczęcia: </p>{{ $reservation->data_rozpoczecia}}</li>
        <li class="list-group-item"><p class="fw-bold">Data zakończenia: </p>{{ $reservation->data_zakonczenia }}</li>
        <li class="list-group-item"><p class="fw-bold">Status: </p>{{ $reservation->status }}</li>
    </ul>
   </div>

@endsection
