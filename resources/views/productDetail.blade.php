@extends('basic_layout.app')

@section('additional_dependencies')
    <link rel="stylesheet" href="{{asset('css/productDetailStyle.css')}}">
@endsection
@section('content')
    <section class="product-info">
        <img class="main-img"
             srcset="{{asset('img/'. $product->imgsource .'/xl_main-img.jpg')}} 950w,
                        {{asset('img/'. $product->imgsource .'/l_main-img.jpg')}} 380w,
                        {{asset('img/'. $product->imgsource .'/m_main-img.jpg')}} 450w,
                        {{asset('img/'. $product->imgsource .'/sxs_main-img.jpg')}} 300w"
             sizes="(min-width: 1200px) 37vw,
                        (min-width: 992px) and (max-width: 1199px) 37vw,
                        (min-width: 768px) and (max-width: 991px) 58vw,
                        95vw"
             src="{{asset('img/'. $product->imgsource .'/sxs_main-img.jpg')}}">
        <img class="side-img1"
             srcset="{{asset('img/'. $product->imgsource .'/xl_side-image.jpg')}} 475w,
                        {{asset('img/'. $product->imgsource .'/l_side-image.jpg')}} 190w,
                        {{asset('img/'. $product->imgsource .'/m_side-image.jpg')}} 225w,
                        {{asset('img/'. $product->imgsource .'/sxs_side-img.jpg')}} 150w"
             sizes="(min-width: 1200px) 18.5vw,
                        (min-width: 992px) and (max-width: 1199px) 18.5vw,
                        (min-width: 768px) and (max-width: 991px) 29vw,
                        47.5vw"
             src="{{asset('img/'. $product->imgsource .'/sxs_side-img.jpg')}}">
        <img class="side-img2"
             srcset="{{asset('img/'. $product->imgsource .'/xl_side-image.jpg')}} 475w,
                        {{asset('img/'. $product->imgsource .'/l_side-image.jpg')}} 190w,
                        {{asset('img/'. $product->imgsource .'/m_side-image.jpg')}} 225w,
                        {{asset('img/'. $product->imgsource .'/sxs_side-img.jpg')}} 150w"
             sizes="(min-width: 1200px) 18.5vw,
                        (min-width: 992px) and (max-width: 1199px) 18.5vw,
                        (min-width: 768px) and (max-width: 991px) 29vw,
                        47.5vw"
             src="{{asset('img/'. $product->imgsource .'/sxs_side-img.jpg')}}">
        <h2 class="product-name">{{$product->name}}</h2>
        <span class="rating-big">
                <i class="fa fa-star checked"></i>
                <i class="fa fa-star checked"></i>
                <i class="fa fa-star checked"></i>
                <i class="fa fa-star checked"></i>
                <i class="fa fa-star"></i>
            </span>
        <p class="product-desc">{{$product->description}}</p>
        <span class="product-price">{{$product->price}}£</span>
        <span class="product-amount"><i class="fa fa-plus"></i><input class="amount-input" type="text"><i
                    class="fa fa-minus"></i></span>
        <button class="white-bcg-button" id="buyButton" type="submit">Pridaj do kosika</button>
    </section>
    <section class="add-review">
        <h2>Pridaj recenziu</h2>
        <form method="POST">
            <textarea class="new-review"></textarea>
            <span class="add-review-controls">
                    <span class="rating"><i class="fa fa-star checked"></i><i class="fa fa-star checked"></i><i
                                class="fa fa-star checked"></i><i class="fa fa-star checked"></i><i class="fa fa-star"></i>
                    </span>
                    <button class="white-bcg-button" id="addReview" type="submit">Pridaj recenziu</button>
                </span>
        </form>
    </section>
@endsection