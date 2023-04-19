@extends('layouts.app')

@section('content')

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">

    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ url('img/foto1.png') }}" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="{{ url('img/hroom.jpg') }}" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="{{ url('img/foto1.png') }}" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>


<div class="container d-flex-column justify-content-center align-items-center text-center">
    <div class="container m-4">
        <h1>Pokoje i apartamenty</h1>
        <p>komfortowe pokoje</p>
    </div>
 <div class="container d-flex justify-content-center align-items-center">
    {{-- <div class="card text-center m-2">
        <div class="card-body">
          <img src="..." class="card-img-top" alt="obrazek pokoju">
          <h5 class="card-title">Pokój superior</h5>
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          <a class="btn btn-danger">Szczegóły</a>
        </div>
        <div class="card-footer text-muted">
          200zł / noc
        </div>
    </div>

    <div class="card text-center m-2">
        <div class="card-body">
          <img src="..." class="card-img-top" alt="obrazek pokoju">
          <h5 class="card-title">Pokój extra</h5>
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          <a class="btn btn-danger">Szczegóły</a>
        </div>
        <div class="card-footer text-muted">
          500zł / noc
        </div>
    </div> --}}
    @foreach($rooms as $room)
    <div class="card text-center m-2">
        <div class="card-body">
        @if($room->id == 1)
          <img src="\img\niski.jpg" class="card-img-top" alt="obrazek pokoju">
        @endif
        @if($room->id == 2)
        <img src="\img\wysoki.jpg" class="card-img-top" alt="obrazek pokoju">
        @endif
        @if($room->id == 3)
        <img src="\img\premium.jpg" class="card-img-top" alt="obrazek pokoju">
        @endif
          <h5 class="card-title">Pokój numer {{$room->id}}. o standardzie: {{$room->standard}}</h5>
          <p class="card-text">Liczba miejsc w pokoju: {{$room->liczba_miejsc}}</p>
          <a class="btn btn-danger" href="{{ route('rooms.show',$room->id) }}">Szczegóły</a>
        </div>
        <div class="card-footer text-muted">
          {{$room->cena}}zł / noc
        </div>
    </div>
    @endforeach
  </div>
     <a class="btn btn-danger m-3" href="{{ route('rooms.index') }}">Pokaż wszystkie</a>
</div>

<div class="container marketing p-5">

    <!-- Three columns of text below the carousel -->
    <div class="row">
      <div class="col-lg-4">
        <img class="rounded-circle" src="/img/restauracja.jpg" alt="Generic placeholder image" width="140" height="140">
        <h2>Restauracja</h2>
        <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <img class="rounded-circle" src="/img/sala.jpg" alt="Generic placeholder image" width="140" height="140">
        <h2>Organizacja imprez</h2>
        <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <img class="rounded-circle" src="/img/konferencja.jpg" alt="Generic placeholder image" width="140" height="140">
        <h2>Konferencje</h2>
        <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->
</div>
@endsection
