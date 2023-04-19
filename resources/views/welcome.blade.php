@extends('layouts.app')

@section('content')
<div class="container w-50 " style="height: 72vh">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="mt-5 login-form">
    <form method="POST" action="{{ route('login.authenticate') }}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input value="kamil@example.com" type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Hasło</label>
            <input value="password" type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" name="remeber" checked id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Pamiętaj mnie</label>
        </div>
        <button type="submit" class="btn btn-danger">Zaloguj</button>
    </form>


</div>
</div>
@endsection
