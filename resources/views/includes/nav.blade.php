<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('index') }}">Hotel Laravel</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="{{ route('index') }}">Strona główna</a>
                <a class="nav-link" href="{{ route('rooms.index') }}">Pokoje</a>
                <a class="nav-link" href="#">O nas</a>
                @if (Auth::check())
                <a class="nav-link" href="{{ route('reservations.index') }}">Rezerwacja</a>
                <a class="nav-link" href="{{ route('guests.index')}}">Goscie</a>
                @endif
            </div>
        </div>

        @if (Auth::check())

            <a class="btn btn-danger" href="{{ route('logout') }}"> {{ Auth::user()->name }} wyloguj się... </a>

        @else

            <a class="btn btn-danger" href="{{route('login')}}">Zaloguj</a>

    @endif
    </div>
</nav>
