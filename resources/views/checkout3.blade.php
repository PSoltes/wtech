@extends('basic_layout.app')
@section('additional_dependencies')
    <link rel="stylesheet" href="{{asset('css/checkout3Style.css')}}">
@endsection
@section('content')
    <nav class="checkout-nav">
            <span class="nav-row"><a class="checkout-nav-link" href="{{url('checkout1')}}">Obsah kosika</a><i
                        class="fas fa-caret-right"></i><a
                        class="checkout-nav-link" href="{{url('checkout2')}}">Platba a doprava</a><i
                        class="fas fa-caret-right"></i><a
                        class="checkout-nav-link" href="#">Dodacie udaje</a></span>
    </nav>
    <h2>Dodacie udaje</h2>
    @if($errors->any())
        <div class="alert-box">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" class="checkout-address" id="form1" action="{{url('orders')}}">
        @csrf
        @if(Auth::check())
            <div>
                <label for="meno-input">Meno</label><input type="text" id="meno-input" name="name"
                                                           value="{{Auth::user()->name}}">
            </div>
            <div>
                <label for="priezvisko-input">Priezvisko</label><input type="text" id="priezvisko-input" name="surname"
                                                                       value="{{Auth::user()->surname}}">
            </div>
            <div>
                <label for="adresa-input">Adresa</label><input type="text" id="adresa-input" name="address"
                                                               value="{{Auth::user()->address}}">
            </div>
            <div>
                <label for="psc-input">PSC</label><input type="text" id="psc-input" name="postcode"
                                                         value="{{Auth::user()->postcode}}">
            </div>
            <div>
                <label for="mesto-input">Mesto</label><input type="text" id="mesto-input" name="city"
                                                             value="{{Auth::user()->city}}">
            </div>
            <div>
                <label for="telc-input">tel. c.</label><input type="text" id="telc-input" name="t_number"
                                                              value="{{Auth::user()->t_number}}">
            </div>
        @else
            <div>
                <label for="meno-input">Meno</label><input type="text" id="meno-input" name="name">
            </div>
            <div>
                <label for="priezvisko-input">Priezvisko</label><input type="text" id="priezvisko-input" name="surname">
            </div>
            <div>
                <label for="adresa-input">Adresa</label><input type="text" id="adresa-input" name="address">
            </div>
            <div>
                <label for="psc-input">PSC</label><input type="text" id="psc-input" name="postcode">
            </div>
            <div>
                <label for="mesto-input">Mesto</label><input type="text" id="mesto-input" name="city">
            </div>
            <div>
                <label for="telc-input">tel. c.</label><input type="text" id="telc-input" name="t_number">
            </div>
        @endif
    </form>
    <button class="white-bcg-button" id="nextButton" form="form1" type="submit">Objednaj</button>
@endsection
