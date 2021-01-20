<div class="products__item">
  <a href="{{ url("product/$product->id") }}" >
    <p class="products__item-title">{{$product->title}}</p>  
    <div class="products__item-img">
        <img src={{asset('img/1.jpg')}} alt="alt">
    </div>  
    <p class="products__item-price">Цена: <b>{{$product->price ? $product->price : $product->old_price}}</b></p>
  </a>  
  <button data="{{ $product->id }}" class="to-cart">В корзину</button>
</div>
