@prepend('styles')
    <link href="{{ mix('css/personal.css') }}" rel="stylesheet" />
@endprepend

@extends('layouts.app') @section('content')

@php
    $user = auth()->user();
@endphp

<div class="personal-top">
  <h1>Личный кабинет</h1>
  <a href="{{ route('personal') }}">Персональные данные</a>
  <a href="{{ route('personal-orders') }}">Заказы</a>
</div>

<form method="POST" action="{{ route('personal-change') }}" enctype="multipart/form-data" class="personal-content">
  @csrf
  <div class="form-group">
    <label for="name">Имя</label>
    <input value={{ $user->name }} type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Имя">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input value={{ $user->email }} type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
  </div>

  <p>Аватар</p>
  <label class="form-label main-button avatar-file" for="customFile">Загрузить файл</label>
  <input accept="image/x-png,image/gif,image/jpeg"  type="file" name="image" class="form-control choose-file" id="customFile" />

  <button type="submit" class="btn btn-primary">Изменить</button>
</form>
@endsection
