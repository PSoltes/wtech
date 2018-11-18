@extends('basic_layout.app')
@section('additional_dependencies')
    <link rel="stylesheet" href="{{asset('css/checkout1Style.css')}}">
@endsection
@section('content')
    <nav class="checkout-nav">
            <span class="nav-row"><a class="checkout-nav-link" href="#">Obsah kosika</a><i
                        class="fas fa-caret-right"></i><a
                        class="checkout-nav-link" href="../html/checkout2.html">Platba a doprava</a><i
                        class="fas fa-caret-right"></i><a
                        class="checkout-nav-link" href="../html/checkout3.html">Dodacie udaje</a></span>
    </nav>
    <section class="checkout-product-thmbs">
        @if(session('cart'))
            <?php $total = 0; ?>
            @foreach(session('cart') as $id => $details)
                    <?php $total += $details['price'] * $details['amount']; ?>
                <hr>
                <article class="checkout-product-thmb">
                    <h3 class="product-name">{{$details['name']}}</h3>
                    <i class="fas fa-times deleteProduct" role="button" data-id="{{$id}}"></i>
                    <img class="checkout-product-img"
                         src="{{asset('img/'. $details['imgsource'] .'/sxs_side-img.jpg')}}">
                    <span class="product-amount"><i class="fa fa-minus remove-one"></i><input class="amount-input" type="text"
                                                                                   value="{{$details['amount']}}"><i
                                class="fa fa-plus add-one"></i></span>
                    <span class="product-price">{{$details['price']}}£</span>
                </article>
            @endforeach
    </section>
    <section class="checkout-summary">
        <div class="checkout-texts">
            <div class="checkout-text">Spolu bez DPH</div>
            <div class="checkout-nmb"><?php echo $total*0.8?>£</div>
            <div class="checkout-text">Spolu s DPH</div>
            <div class="checkout-nmb"><?php echo $total?>£</div>
        </div>
        <button class="white-bcg-button" id="nextButton" type="submit">Dalsi krok</button>
    </section>
    @else
        <p>Kosik je prazdny.</p>
    @endif

@endsection