@extends('basic_layout.app')
@section('additional_dependencies')
    <link rel="stylesheet" href="{{asset('css/registerStyle.css')}}">
@endsection
@section('content')
    <form method="POST" class="main-forms" action="{{ route('register') }}">
        @csrf
        <div class="main-forms-wrapper-outer">
            @if($errors->any())
                <div class="alert-box">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="main-forms-column1">
                <h2>Prihlasovacie udaje</h2>
                <div class="form-group">
                    <label for="email">Email login</label>
                    <input type="email" id="email" name="email" required>

                    <label for="password">Heslo</label>
                    <input type="password" id="password" name="password" required>

                    <label for="password-confirm">Zopakuj heslo</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required>

                </div>
            </div>
            <div class="main-forms-column2">
                <h2>Osobne udaje</h2>
                <div class="form-group">
                    <label for="name">Meno</label>
                    <input type="text" id="name" name="name">

                    <label for="surname">Priezvisko</label>
                    <input type="text" id="surname" name="surname">

                    <label for="address">Adresa</label>
                    <input type="text" id="address" name="address">

                    <label for="psc">PSC</label>
                    <input type="text" id="postcode" name="postcode">

                    <label for="city">Mesto</label>
                    <input type="text" id="city" name="city">

                    <label for="tel">tel. c.</label>
                    <input type="text" id="t_number" name="t_number">
                </div>
            </div>
            <button type="submit" class="white-bcg-button conf-button">Registruj sa!</button>
        </div>
    </form>
@endsection
