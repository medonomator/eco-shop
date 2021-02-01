<ul class="main-product">
  <li class="orders__id">{{ $order->id }}</li>
  <li class="orders__note">{{ $order->note }}</li>
  <li class="orders__sum">{{ $order->sum }} руб.</li>
  <li class="orders__status">{{ Helper::getStatus($order->status) }}</li>
  <li class="orders__created">@datetime($order->created_at )</li>
  <button class="orders__cancel">Отмена заказа</button>
  <div class="child-product">
    @each('partial.order-products', $order->orderProduct, 'orderProduct')
  </div>
</ul>

<div class="cancel-popup">
  <h2>Отменить заказ ?</h2>
  <button class="main-button cancel-none">Нет</button>
  <a class="main-button" href="/cancel-order/{{ $order->id }}">Да</a>
</div>

{{-- cancel-order --}}

<script>
  $('.orders__cancel').click(e => {
    $('.cancel-popup').show('fast');
  })

  $('.cancel-none').click(e => {
    $('.cancel-popup').hide('fast');
  })
</script>