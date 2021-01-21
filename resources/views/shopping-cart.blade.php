@prepend('styles')
    <link href="{{ mix('css/products-shipping.css') }}" rel="stylesheet" />
@endprepend

@extends('layouts.app') @section('content')

<h1>Корзина</h1>

@guest
  Корзина пуста Воспользуйтесь поиском, чтобы найти всё что нужно.
  Если в корзине были товары – <a href="/login">Войдите</a>, чтобы посмотреть список.  
@endguest

@auth
  <div class="products-shipping">
    @foreach ($shopCarts as $item)
      <div class="products-shipping__item">
        <a href="{{ url("product/{$item->product->id}") }}" >
          <div class="products-shipping__item-img">
            <img src={{asset('img/1.jpg')}} alt="alt">
          </div>   
          <p class="products-shipping__item-title">{{$item->product->title}}</p>  
          <p class="products-shipping__item-price">Цена: <b>{{$item->product->price ? $item->product->price : $item->product->old_price}}</b></p>
        </a>  
        <a href="/delete-item-shopping-cart/{{ $item->id }}">
          <i class="fa fa-trash-o" aria-hidden="true"></i>
        </a>
      </div>
    @endforeach 
  </div>
  <div class="products-buttons">
    @if(count($shopCarts))
      <a class="place-order" href="/place-order">Оформить заказ</a>
      <a class="clear-shopping-cart" href="/clear-shopping-cart">Очистить корзину</a>
    @endif
  </div>
@endauth

@endsection
