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

  @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

  @unless($feedbacks ?? '')
      <p class="not-review">Нету ни одного отзыва.</p>
  @endunless

  @isset($feedbacks)
      <div class="feedbacks">
        @foreach ($feedbacks as $feedback)
          <div data-id={{  $feedback->id }} class="feedbacks-item">
            <div class="feedbacks__avatar">
              <div class="feedbacks__avatar-img">
                @if($feedback->avatarUrl)
                  <img src="{{ Storage::url("$feedback->avatarUrl") }}" alt="alt">
                @else
                  <img src="{{ Storage::url('default-avatar.jpeg')  }}" alt="alt">
                @endif
              </div>

              <p class="feedbacks__avatar-name" >{{ $feedback->name }}</p>
            </div>
            <div class="feedbacks__content">
              {{ $feedback->feedback }}
              @php
                  $clientId = auth()->user()->id;
              @endphp
              @if($clientId === $feedback->client_id)
                <button data-delete-feedback='1' data-client-id={{ $clientId }} data-feedback-id={{ $feedback->id }} class="main-button delete-feedback">Удалить</button>
              @endif
           
            </div>
          </div>
        @endforeach
      </div>
  @endisset

  <form method="POST" action="{{ route("send-review") }}">
    @csrf
    <div class="form-group">
      <textarea name="feedback" required class="form-control send-review-area" id="exampleFormControlTextarea1" placeholder="Новый отзыв" rows="3"></textarea>
      <button data-send-review='1' type="submit" class="main-button">Отправить отзыв</button>
      <input type="text" hidden name="productId" value="{{ $product->id }}">
    </div>
  </form>

  <script>
    [...document.getElementsByTagName('button')].forEach(button => {
      if(button.getAttribute('data-delete-feedback')) {
        button.addEventListener('click', (e) => {
          const clientId = e.target.getAttribute('data-client-id');
          const feedbackId = e.target.getAttribute('data-feedback-id');
          
          (async()  => {
            try {
              const res = await fetch(`${MAIN_URL}/delete-feedback/${clientId}/${feedbackId}`)
              
              if((await res.json()).status === 'ok') {
                document.querySelectorAll('.feedbacks-item').forEach(item => {
                  if(item.getAttribute('data-id') === feedbackId) {
                    item.remove();
                  }
                })
              }
              
            } catch (error) {
              console.log(error);
            }
          })();
        })
      }  
    });
  </script>
</div>

@endsection

