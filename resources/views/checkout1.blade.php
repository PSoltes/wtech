@extends('basic_layout.app')
@section('additional_dependencies')
    <link rel="stylesheet" href="{{asset('css/checkout1Style.css')}}">
@endsection
@section('content')
    <nav class="checkout-nav">
            <span class="nav-row"><a class="checkout-nav-link" href="#">Obsah kosika</a><i
                        class="fas fa-caret-right"></i><a
                        class="checkout-nav-link link-disabled" href="{{url('checkout2')}}">Platba a doprava</a><i
                        class="fas fa-caret-right"></i><a
                        class="checkout-nav-link link-disabled" href="{{url('checkout3')}}">Dodacie udaje</a></span>
    </nav>
    @if(!empty($CartItems))
        <section class="checkout-product-thmbs">
            <?php $total = 0;?>
            @foreach($CartItems as $cartItem)
                <hr>
                <?php $total += $cartItem->product->price * $cartItem->amount;?>
                <article class="checkout-product-thmb">
                    <h3 class="product-name">{{$cartItem->product->name}}</h3>
                    <i class="fas fa-times deleteProduct" role="button" data-id="{{$cartItem->product->id}}"></i>
                    <img class="checkout-product-img"
                         src="{{asset('img/'. $cartItem->product->imgsource .'/sxs_side-img.jpg')}}">
                    <span class="product-amount"><i class="fa fa-minus remove-one"
                                                    data-id="{{$cartItem->product->id}}"></i><input class="amount-input"
                                                                                                    type="text"
                                                                                                    value="{{$cartItem->amount}}"
                                                                                                    data-id="{{$cartItem->product->id}}"
                                                                                                    id="{{'id'. $cartItem->product->id}}"><i
                                class="fa fa-plus add-one" data-id="{{$cartItem->product->id}}"></i></span>
                    <span class="product-price">{{$cartItem->product->price}}£</span>
                </article>
            @endforeach
        </section>
        <section class="checkout-summary">
            <div class="checkout-texts">
                <div class="checkout-text">Spolu bez DPH</div>
                <div class="checkout-nmb"><?php echo $total * 0.8?>£</div>
                <div class="checkout-text">Spolu s DPH</div>
                <div class="checkout-nmb"><?php echo $total?>£</div>
            </div>
            <button class="white-bcg-button" id="nextButton" type="button"><a href="{{url('checkout2')}}">Dalsi krok</a>
            </button>
        </section>
    @else
        <p>Kosik je prazdny.</p>
    @endif
    {{--@else--}}
    {{--@if(session('cart'))--}}
    {{--@foreach(session('cart') as $id => $details)--}}
    {{--<hr>--}}
    {{--<article class="checkout-product-thmb">--}}
    {{--<h3 class="product-name">{{$details['name']}}</h3>--}}
    {{--<i class="fas fa-times deleteProduct" role="button" data-id="{{$id}}"></i>--}}
    {{--<img class="checkout-product-img"--}}
    {{--src="{{asset('img/'. $details['imgsource'] .'/sxs_side-img.jpg')}}">--}}
    {{--<span class="product-amount"><i class="fa fa-minus remove-one" data-id="{{$id}}"></i><input class="amount-input"--}}
    {{--type="text"--}}
    {{--data-id="{{$id}}"--}}
    {{--id="{{'id'. $id}}"--}}
    {{--value="{{$details['amount']}}"><i--}}
    {{--class="fa fa-plus add-one" data-id="{{$id}}"></i></span>--}}
    {{--<span class="product-price">{{$details['price']}}£</span>--}}
    {{--</article>--}}
    {{--@endforeach--}}
    {{--</section>--}}
    {{--<section class="checkout-summary">--}}
    {{--<div class="checkout-texts">--}}
    {{--<div class="checkout-text">Spolu bez DPH</div>--}}
    {{--<div class="checkout-nmb">100£</div>--}}
    {{--<div class="checkout-text">Spolu s DPH</div>--}}
    {{--<div class="checkout-nmb">100£</div>--}}
    {{--</div>--}}
    {{--<button class="white-bcg-button" id="nextButton" type="submit">Dalsi krok</button>--}}
    {{--</section>--}}
    {{--@else--}}
    {{--<p>Kosik je prazdny.</p>--}}
    {{--@endif--}}
@endsection