@extends('layouts.app')

@section('content')
   <div class="container-fluid w-50 pt-5">
    @if(session('error'))
     <div class="alert alert-danger">{{session('error')}}</div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><p class="fw-bold">ID użytkownika:</p>{{ $guest->id }}</li>
        <li class="list-group-item"><p class="fw-bold">Imię: </p>{{ $guest->imie }}</li>
        <li class="list-group-item"><p class="fw-bold">Nazwisko: </p>{{ $guest->nazwisko }}</li>
        <li class="list-group-item"><p class="fw-bold">Pesel: </p>{{ $guest->pesel }}</li>
        <li class="list-group-item"><p class="fw-bold">Ulica: </p>{{ $guest->ulica }}</li>
        <li class="list-group-item"><p class="fw-bold">Miasto: </p>{{ $guest->miasto }}</li>
        <li class="list-group-item"><p class="fw-bold">Numer budynku: </p>{{ $guest->nr_budynku }}</li>
        <li class="list-group-item"><p class="fw-bold">Kod pocztowy: </p>{{ $guest->kod_pocztowy }}</li>
        <li class="list-group-item"><p class="fw-bold">Miejscowość: </p>{{ $guest->miejscowosc }}</li>
        <li class="list-group-item"><p class="fw-bold">Kraj: </p>{{ $guest->kraj }}</li>
        <li class="list-group-item"><p class="fw-bold">Numer telefonu: </p>{{ $guest->telefon }}</li>
        <li class="list-group-item"><p class="fw-bold">Email: </p>{{ $guest->email }}</li>
    </ul>
   </div>
@endsection
