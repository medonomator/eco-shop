@prepend('styles')
    <link href="{{ mix('css/personal.css') }}" rel="stylesheet" />
@endprepend

@extends('layouts.app') @section('content')

<div class="personal-top">
  <h1>Личный кабинет</h1> 
  <a href="{{ route('personal') }}">Персональные данные</a>
  <a href="{{ route('personal-orders') }}">Заказы</a>
</div>

<form class="personal-content">
  <div class="form-group">
    <label for="name">Имя</label>
    <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Имя">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
  </div>
  <button type="submit" class="btn btn-primary">Изменить</button>
</form>

@endsection
