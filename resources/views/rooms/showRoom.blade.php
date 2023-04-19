@extends('layouts.app')

@section('content')

    <div style="height: 85vh" class="container d-flex-row justify-content-center align-items-center pt-5">

        <div class="d-flex align-items-center justify-content-center row row-cols-1 row-cols-md-3 g-2">
                <div class="col ">
                    <div class="card h-100">
                        <div class="card text-center m-1">
                            <div class="card-body">
                            @if(session('error'))
                                <div class="alert alert-danger">{{session('error')}}</div>
                            @endif
                                <h5 class="card-title">Pokój numer: {{ $room->id }}</h5>
                                <h5>O standardzie {{ $room->standard }}</h5>
                                <p class="card-text">LICZBA MIEJSC: {{ $room->liczba_miejsc }}</p>
                                <p class="fw-bold">Aktualnie pokój jest @if ($room->dostepny==1) dostępny @else niedostępny @endif</p>
                                <p>{{ $room->opis }}</p>
                            </div>
                            <div class="card-footer text-muted d-flex flex-column">
                                {{ $room->cena }}zł / noc
                                @if (Auth::check())
                                <a class="btn btn-danger mb-2" href="{{ route('rooms.edit',$room->id) }}" >Edytuj</a>
                                <form class="w-100 " method="POST" action="{{ route('rooms.destroy',$room->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger w-100" type="submit">Usuń</button>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>

@endsection
