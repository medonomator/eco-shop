@prepend('styles')
    <link href="{{ mix('css/product.css') }}" rel="stylesheet" />
@endprepend

@extends('layouts.app') @section('content')

<div class="card-product">
  <div class="card-product__left">
    <div class="card-product__left-img">
      <img src="{{ asset("img/$product->img") }}" alt="alt">
    </div>
    <div class="card-product__left-price">
      Цена: <b>{{$product->price ? $product->price : $product->old_price}}</b> рублей.
    </div>
    <button data="{{ $product->id }}" class="to-cart">В корзину</button>
  </div>
  
  <div class="card-product__right">
    <div class="card-product__right-title">{{ $product->title }}</div>
    <div class="card-product__right-content">{{ $product->content }}</div>
  </div>
</div>

<div class="product-reviews">
  <h2>Отзывы о товаре:</h2>

  @for ($i = 0; $i < 10; $i++)
      Хороший отзыв
      <br />  
  @endfor

</div>

@endsection