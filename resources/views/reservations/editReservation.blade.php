@extends('layouts.app')

@section('content')
<div class="container-fluid w-50">
    @if(session('error'))
    <div class="alert alert-danger">{{session('error')}}</div>
@endif
    <form method="POST" action="{{ route('reservations.update',$reservation->id) }}">
     @csrf
     @method('PUT')
     <div class="form-group mb-3 pt-5">
         <div class="mb-3">
             <label for="status" class="form-label">Operacja</label>
             <select id="status" name="status" class="form-select @error('fuel_type') is-invalid @enderror" aria-label="Default select example">
                 <option selected value="wynajeto">Wynajem</option>
                 <option value="zarezerwowano">Rezerwacja</option>
                 <option value="anulowano">Anulowano</option>
             </select>
             <div class="invalid-feedback">Nieprawidłowe dane!</div>
         </div>
         <div class="mb-3">
            <label for="room_id" class="form-label">Pokój</label>
            <select id="room_id" name="room_id" class="form-select @error('fuel_type') is-invalid @enderror" aria-label="Default select example">
                @foreach ($rooms as $room)
                    <option value="{{ $room->id }}">Pokój numer: {{ $room->id }}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">Nieprawidłowe dane!</div>
        </div>
        <div class="mb-3">
            <label for="guest_id" class="form-label">Gość</label>
            <select id="guest_id" name="guest_id" class="form-select @error('fuel_type') is-invalid @enderror" aria-label="Default select example">
                @foreach ($guests as $guest)
                    <option value="{{ $guest->id }}">{{ $guest->imie }} {{ $guest->nazwisko }}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">Nieprawidłowe dane!</div>
        </div>
        <div class="mb-3">
            <label for="data_rozpoczecia" class="form-label">Data rozpoczęcia rezerwacji</label>
            <input id="data_rozpoczecia" name="data_rozpoczecia" type="date"
                class="form-control @error('data_rozpoczecia') is-invalid @enderror">
            <div class="invalid-feedback">Nieprawidłowe dane!</div>
        </div>
        <div class="mb-3">
            <label for="data_zakonczenia" class="form-label">Data zakończenia rezerwacji</label>
            <input id="data_zakonczenia" name="data_zakonczenia" type="date"
                class="form-control @error('data_zakonczenia') is-invalid @enderror">
            <div class="invalid-feedback">Nieprawidłowe dane!</div>
        </div>
        <input class="btn btn-danger" type="submit" value="Edytuj">
    </form>
</div>
@endsection
