@prepend('styles')
    <link href="{{ mix('css/personal.css') }}" rel="stylesheet" />
@endprepend

@extends('layouts.app') @section('content')

<div class="personal-top">
  <h1>Личный кабинет</h1> 
  <a href="{{ route('personal') }}">Персональные данные</a>
  <a href="{{ route('personal-orders') }}">Заказы</a>
</div>

<div class="personal-order">
    <h2>Заказы</h2>

    <div class="orders">
      <ul class=orders-header>
        <li>#</li>
        <li>Note</li>
        <li>Сумма заказа</li>
        <li>Статус</li>
        <li>Дата создания</li>
      </ul>
        @each('partial.orders', $orders, 'order')
    </div>
</div>

@endsection
