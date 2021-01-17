@extends('layouts.app') @section('content')

<section>
    <div class="products">
        @foreach ($products ?? '' as $index=>$product)
        <a href="{{ url("product/$product->id") }}" class="products__item">
            <p class="products__item-title">{{$product->title}}</p>  
            <div class="products__item-img">
                <img src={{asset('img/1.jpg')}} alt="alt">
            </div>

            <p class="products__item-price">Цена: <b>{{$product->price ? $product->price : $product->old_price}}</b></p>

            <button class="to-cart">В корзину</button>
        </a>
    @endforeach
    </div>
    
    <div class="links">
        {{ $products ?? ''->links('vendor.pagination.default') }}
    </div>
    
</section>

@endsection
