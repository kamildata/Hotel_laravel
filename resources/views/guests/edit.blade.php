@extends('layouts.app')

@section('content')
<div class="container-fluid w-50">
    <form method="POST" action="{{route('guests.update',$guest->id)}}">
     @csrf
     @method('PUT')
     <div class="form-group mb-3 pt-5">
         <div class="mb-3 d-flex justify-content-between ">
            <div class="mb-3 m-1 w-100">
                <label for="imie" class="form-label">Imię</label>
                <input value="{{$guest->imie}}"  id="imie" name="imie" type="text"
                    class="form-control @error('imie') is-invalid @enderror">
                <div class="invalid-feedback">Nieprawidłowe dane!</div>
            </div>
            <div class="mb-3 m-1 w-100">
                <label for="nazwisko" class="form-label">Nazwisko</label>
                <input value="{{$guest->nazwisko}}"  id="nazwisko" name="nazwisko" type="text"
                    class="form-control @error('nazwisko') is-invalid @enderror">
                <div class="invalid-feedback">Nieprawidłowe dane!</div>
            </div>
         </div>
         <div class="mb-3">
             <label for="pesel" class="form-label">Pesel</label>
             <input value="{{$guest->pesel}}" id="pesel" name="pesel" type="text"
                 class="form-control @error('pesel') is-invalid @enderror">
             <div class="invalid-feedback">Nieprawidłowe dane!</div>
         </div>
         <div class="mb-3  d-flex justify-content-between ">
            <div class="mb-3">
                <label for="miejscowosc" class="form-label">Miejscowość</label>
                <input value="{{$guest->miejscowosc}}" id="miejscowosc" name="miejscowosc" type="text"
                    class="form-control @error('miejscowosc') is-invalid @enderror">
                <div class="invalid-feedback">Nieprawidłowe dane!</div>
            </div>
            <div class="mb-3">
                <label for="ulica" class="form-label">Ulica</label>
                <input value="{{$guest->ulica}}" id="ulica" name="ulica" type="text"
                    class="form-control @error('ulica') is-invalid @enderror">
                <div class="invalid-feedback">Nieprawidłowe dane!</div>
            </div>
            <div class="mb-3">
                <label for="nr_budynku" class="form-label">Numer budynku</label>
                <input value="{{$guest->nr_budynku}}" id="nr_budynku" name="nr_budynku" type="text"
                    class="form-control @error('nr_budynku') is-invalid @enderror">
                <div class="invalid-feedback">Nieprawidłowe dane!</div>
            </div>
         </div>
         <div class="mb-3 d-flex justify-content-between">
            <div class="mb-3">
                <label for="kod_pocztowy" class="form-label">Kod pocztowy</label>
                <input value="{{$guest->kod_pocztowy}}" id="kod_pocztowy" name="kod_pocztowy" type="text"
                    class="form-control @error('kod_pocztowy') is-invalid @enderror">
                <div class="invalid-feedback">Nieprawidłowe dane!</div>
            </div>
            <div class="mb-3">
                <label for="miasto" class="form-label">Miasto</label>
                <input value="{{$guest->miasto}}" id="miasto" name="miasto" type="text"
                    class="form-control @error('miasto') is-invalid @enderror">
                <div class="invalid-feedback">Nieprawidłowe dane!</div>
            </div>
            <div class="mb-3">
                <label for="kraj" class="form-label">Kraj</label>
                <input value="{{$guest->kraj}}" id="kraj" name="kraj" type="text"
                    class="form-control @error('kraj') is-invalid @enderror">
                <div class="invalid-feedback">Nieprawidłowe dane!</div>
            </div>
         </div>
         <div class="mb-3">
             <label for="telefon" class="form-label">Numer telefonu</label>
             <input value="{{$guest->telefon}}" id="telefon" name="telefon" type="text"
                 class="form-control @error('telefon') is-invalid @enderror">
             <div class="invalid-feedback">Nieprawidłowe dane!</div>
         </div>
         <div class="mb-3">
             <label for="email" class="form-label">Email</label>
             <input value="{{$guest->email}}" id="email" name="email" type="email"
                 class="form-control @error('email') is-invalid @enderror">
             <div class="invalid-feedback">Nieprawidłowe dane!</div>
         </div>

         <input class="btn btn-danger" type="submit" value="Edytuj">
     </form>
  </div>
@endsection
