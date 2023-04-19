@extends('layouts.app')

@section('content')

<div class="container-fluid w-50">
    <form method="POST" action="{{ route('rooms.store') }}">
     @csrf
     <div class="form-group mb-3 pt-5">
         <div class="mb-3">
             <label for="pietro" class="form-label">Piętro</label>
             <select id="pietro" name="pietro" class="form-select @error('fuel_type') is-invalid @enderror" aria-label="Default select example">
                 <option selected value="1">1 piętro</option>
                 <option value="2">2 piętro</option>
                 <option value="3">3 piętro</option>
                 <option value="4">4 piętro</option>
                 <option value="5">5 piętro</option>
                 <option value="6">6 piętro</option>
                 <option value="7">7 piętro</option>
                 <option value="8">8 piętro</option>
                 <option value="9">9 piętro</option>
                 <option value="10">10 piętro</option>
             </select>
             <div class="invalid-feedback">Nieprawidłowe dane!</div>
         </div>
         <div class="mb-3">
            <label for="standard" class="form-label">Standard</label>
            <select id="standard" name="standard" class="form-select" aria-label="Default select example"  @error('standard') is-invalid @enderror>
                <option selected value="Niski">Niski</option>
                <option value="Wysoki">Wysoki</option>
                <option value="Premium">Premium</option>
            </select>
            <div class="invalid-feedback">Nieprawidłowe dane!</div>
        </div>
        <div class="mb-3">
            <label for="liczba_miejsc" class="form-label">Liczba miejsc w pokoju</label>
            <input id="liczba_miejsc" name="liczba_miejsc" type="number"
                class="form-control @error('liczba_miejsc') is-invalid @enderror">
            <div class="invalid-feedback">Nieprawidłowe dane!</div>
        </div>
        <div class="mb-3">
            <label for="dostepny" class="form-label">dostepny</label>
            <select id="dostepny" name="dostepny" class="form-select" aria-label="Default select example"  @error('standard') is-invalid @enderror>
                <option selected value="1">Dostępny</option>
                <option value="0">Niedostępny</option>
            </select>
            <div class="invalid-feedback">Nieprawidłowe dane!</div>
        </div>
        <div class="mb-3">
            <label for="cena" class="form-label">Cena za noc</label>
            <input  id="cena" name="cena" type="number"
                class="form-control @error('cena') is-invalid @enderror">
            <div class="invalid-feedback">Nieprawidłowe dane!</div>
        </div>
        <div class="mb-3">
            <label for="opis" class="form-label">Opis</label>
            <textarea class="form-control" id="opis" name="opis" aria-label="With textarea"></textarea>
        </div>
        <input class="btn btn-danger" type="submit" value="Dodaj">
    </form>
</div>
@endsection
