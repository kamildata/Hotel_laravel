@extends('layouts.app')

@section('content')


<div class="container-fluid pt-5">
    <div class="d-flex justify-content-between align-items-end mb-5 pb-2">
        <h1>Rezerwacje</h1>
        <div class="d-flex align-items-end">
            <div class="me-4">
                <a class="btn btn-danger" href="{{ route('reservations.create') }}">Dodaj rezerwacje</a>
            </div>
        </div>
    </div>
</div>

<div class="container">
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Status</th>
        <th scope="col">Data rozpoczęcia</th>
        <th scope="col">Data zakończenia</th>
        <th scope="col">Imie</th>
        <th scope="col">Nazwisko</th>
        <th scope="col">Numer pokoju</th>
    </tr>
    </thead>
    <tbody>
        @foreach($reservations as $reservation)
    <tr>
        <th scope="row">{{$reservation->id}}</th>
        <td>{{$reservation->status}}</td>
        <td>{{$reservation->data_rozpoczecia}}</td>
        <td>{{$reservation->data_zakonczenia}}</td>
        <td>{{$reservation->guest->imie}}</td>
        <td>{{$reservation->guest->nazwisko}}</td>
        <td>{{$reservation->room_id}}</td>
        <td><a href="{{ route('reservations.show',$reservation->id) }}">Pokaż</a></td>
            <td><a href="{{ route('reservations.edit',$reservation->id) }}">Edytuj</a></td>
            <td>
                <form method="POST" action="{{ route('reservations.destroy',$reservation->id) }}">
                  @csrf
                  @method('DELETE')
                  <button type="submit">Usuń</button>
                </form>
            </td>
    </tr>
        @endforeach
    </tbody>
</table>
{{ $reservations -> links() }}
</div>
@endsection
