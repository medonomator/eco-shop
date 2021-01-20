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
    @foreach ($products as $product)
      <div class="products-shipping__item">
        <a href="{{ url("product/$product->id") }}" >
          <div class="products-shipping__item-img">
            <img src={{asset('img/1.jpg')}} alt="alt">
          </div>   
          <p class="products-shipping__item-title">{{$product->title}}</p>  
          <p class="products-shipping__item-price">Цена: <b>{{$product->price ? $product->price : $product->old_price}}</b></p>
        </a>  
        <i data="{{ $product->id }}" class="fa fa-trash-o" aria-hidden="true"></i>
      </div>
    @endforeach 
  </div>
@endauth

@endsection
