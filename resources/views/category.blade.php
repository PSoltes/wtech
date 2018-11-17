@extends('basic_layout.app')
@section('additional_dependencies')
    <link rel="stylesheet" href="{{asset('css/categoryPreviewStyle.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
@endsection
@section('content')
    <form class="filtre" id="filtre" method="get">
        <div class="price-range-filter">
            <div class="input-group-custom">
                <label for="price-box1">Cena od</label><input type="text" class="form-control" id="price-box1" name="priceFrom">
            </div>
            <div class="input-group-custom">
                <label for="price-box2">Cena do</label><input type="text" class="form-control" id="price-box2" name="priceTo">
            </div>
        </div>
        <div class="order-filter">
            <span class="radio"><b>Zoradit podla:</b></span>
            <span class="radio"><input type="radio" id="cheapest" name="order"><label for="cheapest">Najlacnejsie</label></span>
            <span class="radio"><input type="radio" id="expensive" name="order"><label for="expensive">Najdrahsie</label></span>
            <span class="radio"><input type="radio" id="popular" name="order"><label for="popular">Najoblubenejsie</label></span>
        </div>
        <div class="input-group-custom">
            <button type="button" class="white-bcg-button filter-submit-button">Filtruj</button>
        </div>
    </form>
    <section class="main-products-section">
        @forelse($products as $product)
            <a href="{{url('products/'.$product->id)}}">
                <article class="product-thumbnail">
                    <img class="thumbnail-pic" alt="obrazok produktu" src="{{asset('img/'. $product->imgsource .'/sxs_main-img.jpg')}}">
                    <h1 class="product-name">{{$product->name}}</h1>
                    <p class="product-desc">{{$product->description}}</p>
                    <button class="white-bcg-button buy-product" type="button">Pridaj do kosika</button>
                    <p class="product-price">{{$product->price}}£</p>
                </article>
            </a>
            @empty
            <p>V tejto sekcii nie su ziadne produkty</p>
            @endforelse
    </section>
    <nav class="pagination-wrapper">
        {{$products->links()}}
    </nav>
@endsection