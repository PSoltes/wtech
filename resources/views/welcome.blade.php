@extends('basic_layout.app')

@section('additional_dependencies')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/welcomeStyle.css') }}">
@endsection

@section('content')
    <section class="main-products-section">
       @foreach($products as $product)
                <article class="product-thumbnail">
                    <a class="thumbnail-pic" href="{{url('products/'.$product->id)}}">
                        <img alt="obrazok produktu" src="{{asset('img/'. $product->imgsource .'/sxs_main-img.jpg')}}">
                    </a>
                    <h1 class="product-name">
                        <a href="{{url('products/'.$product->id)}}">{{$product->name}}</a>
                    </h1>
                        <p class="product-desc">{{$product->description}}</p>
                        <p class="product-price">{{$product->price}}£</p>
                    <form type="get" action="{{ url('product/addToCart') }}">
                        <input type="hidden" value="1" name="amnt">
                        <input type="hidden" value="{{$product->id}}" name="id">
                        <button class="white-bcg-button buy-product" type="submit">Pridaj do kosika</button>
                    </form>
                </article>
        @endforeach
    </section>
    <div class="carousel">
        <div id="carouselExampleControls2" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{asset('img/carousel1_xl.jpg')}}" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{asset('img/carousel2.jpg')}}" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{asset('img/carousel3.jpg')}}" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls2" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls2" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
@endsection
