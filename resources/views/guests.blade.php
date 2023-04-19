@extends('layouts.app')

@section('content')
<div class="container-fluid pt-5">
    <div class="d-flex justify-content-between align-items-end mb-5 pb-2">
        <h1>Użytkownicy</h1>
        <div class="d-flex align-items-end">
            <div class="me-4">
                <a class="btn btn-danger" href="{{ route('guests.create') }}">Dodaj użytkownika</a>
            </div>
        </div>
    </div>
</div>
<div class="container">
      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Imie</th>
            <th scope="col">Nazwisko</th>
            <th scope="col">Miejscowość</th>
            <th scope="col">Kod pocztowy</th>
            <th scope="col">Telefon</th>
            <th scope="col">Email</th>
        </tr>
        </thead>
        <tbody>
            @foreach($guests as $guest)
        <tr>
            <th scope="row">{{$guest->id}}</th>
            <td>{{$guest->imie}}</td>
            <td>{{$guest->nazwisko}}</td>
            <td>{{$guest->miejscowosc}}</td>
            <td>{{$guest->kod_pocztowy}}</td>
            <td>{{$guest->telefon}}</td>
            <td>{{$guest->email}}</td>
            <td><a href="{{ route('guests.show',$guest->id) }}">Pokaż</a></td>
            <td><a href="{{ route('guests.edit',$guest->id) }}">Edytuj</a></td>
            <td>
                <form method="POST" action="{{ route('guests.destroy',$guest->id) }}">
                  @csrf
                  @method('DELETE')
                  <button type="submit">Usuń</button>
                </form>
            </td>
        </tr>
            @endforeach
        </tbody>
    </table>
      {{ $guests -> links() }}
</div>
@endsection
