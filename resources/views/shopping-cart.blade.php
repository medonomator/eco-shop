@prepend('styles')
    <link href="{{ mix('css/products-shipping.css') }}" rel="stylesheet" />
@endprepend

@extends('layouts.app') @section('content')

<h1>Корзина</h1>

@guest
  Корзина пуста Воспользуйтесь поиском, чтобы найти всё что нужно.
  Если в корзине были товары – <a href="{{ route('login') }}">Войдите</a>, чтобы посмотреть список.  
@endguest

@auth

  <a class="clear-shopping-cart" href="{{ route('clear-shopping-cart') }}">Очистить корзину</a>

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
        <a href="{{ route('delete-item-shopping-cart', $item->id) }}">
          <i class="fa fa-trash-o" aria-hidden="true"></i>
        </a>
      </div>
    @endforeach 
  </div>

  @if(count($shopCarts))
    <div class="prepare-order">
      <h2>Оформление заказа</h2>

      <form action="{{ route('place-order') }}" method="POST">
        @csrf
        <div class="prepare-order__top">
          <div class="payment">
            <h3>Оплата</h3>
            <div class="types-payment">
              <div class="radio">
                <input type="radio" id="male" name="payment" required value="nal">
                <label for="male">Наличные</label><br>
                <div class="img img-1"><img src="{{ asset('img/icons/nalik.png') }}" alt="alt"></div>
              </div>
              <div class="radio">
                <input type="radio" id="female" name="payment" required value="visa">
                <label for="female">Банковская карта</label><br>
                <div class="img img-2"><img src="{{ asset('img/icons/visa.png') }}" alt="alt"></div>
              </div>
              <div class="radio">
                <input type="radio" id="other" name="payment" required value="sber">
                <label for="other">Сбербанк Онлайн</label>
                <div class="img img-3"><img src="{{ asset('img/icons/sber.png') }}" alt="alt"></div>
              </div>
              <div class="radio">
                <input type="radio" id="other" name="payment" required value="yande">
                <label for="other">Яндекс деньги</label>
                <div class="img img-4"><img src="{{ asset('img/icons/yandex.png') }}" alt="alt"></div>
              </div>
            </div>
          </div>
          <div class="delivery">
            <h3>Доставка</h3>
            <input type="radio" id="male" name="delivery" required value="self">
            <label for="male">Самовывоз</label><br>
            <input type="radio" id="female" name="delivery" required value="deliver">
            <label for="female">Доставка по москве</label><br>
          </div>
        </div>
        <div class="prepare-order__bottom"></div>
    
        <div  class="order-amount">Сумма заказа: <b>{{ $amount }}</b> руб.</div>
        <input name="amount" value="{{ $amount }}" hidden type="text">

        <button class="place-order">Оформить заказ</button>
      </form>
    </div>   
  @endif
  
@endauth

@endsection
