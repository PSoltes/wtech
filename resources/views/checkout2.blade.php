@extends('basic_layout.app')
@section('additional_dependencies')
    <link rel="stylesheet" href="{{asset('css/checkout2Style.css')}}">
@endsection
@section('content')
    <nav class="checkout-nav">
            <span class="nav-row"><a class="checkout-nav-link" href="{{url('checkout1')}}">Obsah kosika</a><i
                        class="fas fa-caret-right"></i><a
                        class="checkout-nav-link" href="#">Platba a doprava</a><i class="fas fa-caret-right"></i><a
                        class="checkout-nav-link link-disabled" href="{{url('checkout3')}}">Dodacie udaje</a></span>
    </nav>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form type="get" action="{{url('checkout3')}}">
        <section class="checkout-delivery">
            <h2>Doprava</h2>
            <span class="checkout-radio-group">
            <input type="radio" name="dopravaAnswer" id="radioDoprava1" value="1">
            <label for="radioDoprava1">Kurier DHL</label>
            </span>
            <span class="checkout-radio-group">
            <input type="radio" name="dopravaAnswer" id="radioDoprava2" value="2">
            <label for="radioDoprava2">Kurier DHL</label>
            </span>
            <span class="checkout-radio-group">
            <input type="radio" name="dopravaAnswer" id="radioDoprava3" value="3">
            <label for="radioDoprava3">Kurier DHL</label>
            </span>
            <span class="checkout-radio-group">
            <input type="radio" name="dopravaAnswer" id="radioDoprava4" value="4">
            <label for="radioDoprava4">Kurier DHL</label>
            </span>


        </section>
        <section class="checkout-payment">
            <h2>Platba</h2>
            <span class="checkout-radio-group">
            <input type="radio" name="paymentAnswer" id="radioPlatba1" value="1">
            <label for="radioDoprava1">Maestro</label>
            </span>
            <span class="checkout-radio-group">
            <input type="radio" name="paymentAnswer" id="radioPlatba2" value="2">
            <label for="radioDoprava2">Maestro</label>
            </span>
            <span class="checkout-radio-group">
            <input type="radio" name="paymentAnswer" id="radioPlatba3" value="3">
            <label for="radioDoprava3">Maestro</label>
            </span>
            <span class="checkout-radio-group">
            <input type="radio" name="paymentAnswer" id="radioPlatba4" value="4">
            <label for="radioDoprava4">Maestro</label>
            </span>
        </section>
        <button class="white-bcg-button" id="nextButton" type="submit">Dalsi krok</button>
    </form>
@endsection