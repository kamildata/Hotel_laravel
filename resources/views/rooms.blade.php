@extends('layouts.app')

@section('content')

<div class="position-relative overflow-hidden h-50 text-center bg-light " style="background-image: url('img/wysoki.jpg');background-size: cover;">
    <div class="col-md-5 p-lg-5 mx-auto my-5">
      <h1 class="display-4 fw-normal" >Pokoje</h1>
      <p class="lead fw-normal">Najwyższa jakość usług, świetna atmosfera, zarezerwuj u nas pokój!</p>
      <a class="btn btn-outline-dark" href="{{ route('login') }}">Rezerwuj</a>
    </div>
    <div class="product-device shadow-sm d-none d-md-block"></div>
    <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
  </div>

<div class="container text-center p-4 w-50 ">
    <h1 class="p-2">Apartamenty i pokoje hotelowe!</h1>
    <h4 class="p-1">Jeśli planujecie spędzić w Rzeszowie kilka dni, a interesują Was noclegi tylko w ścisłym centrum miasta, to Waszym najlepszym wyborem będzie Hotel Bristol Tradition & Luxury.</h4>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Amet alias dolores voluptas minus voluptatibus asperiores magni eveniet ducimus neque, aliquam a quis ratione eius labore culpa fugit. Provident, sed a.
    Autem provident excepturi ab dolorum necessitatibus, aut porro cumque veniam mollitia non impedit vel accusamus sunt quos ducimus, aliquid quam voluptates placeat. Minima consectetur laboriosam voluptatem, necessitatibus esse ipsum error.
    Tempore, eligendi dicta sint suscipit aperiam quos harum amet officia soluta perferendis nisi enim! Perspiciatis perferendis velit facilis iusto ipsa ab adipisci, ut odio laboriosam rerum saepe asperiores, nesciunt illo.</p>
</div>

<div class="container-md d-flex flex-column justify-content-center align-items-center">
    @if (Auth::check())
        <a class="btn btn-danger m-2 p-3 w-20" href="{{ route('rooms.create') }}" >Dodaj pokój</a>
    @endif
<div class="row row-cols-1 row-cols-md-3 g-2">
    @foreach($rooms as $room)
        <div class="col">
            <div class="card h-100">
                <div class="card text-center m-1 h-100">
                    <div class="card-body">
                        <h5 class="card-title">Pokój numer: {{ $room->id }}</h5>
                        <h5>O standardzie {{ $room->standard }}</h5>
                        <p class="card-text">LICZBA MIEJSC: {{ $room->liczba_miejsc }}</p>
                        <p class="card-text">{{ $room->opis }}</p>
                        <a class="btn btn-danger" href="{{ route('rooms.show',$room->id) }}" >Szczegóły</a>
                    </div>
                    <div class="card-footer text-muted">
                        {{ $room->cena }}zł / noc
                    </div>
                </div>
            </div>
    </div>
    @endforeach
</div>
</div>
@endsection
