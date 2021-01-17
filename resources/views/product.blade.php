@extends('layouts.app') @section('content')

<div class="card-product">
  <div class="card-product__img">
    <img src="{{ asset("img/$product->img") }}" alt="alt">
  </div>
</div>

@endsection