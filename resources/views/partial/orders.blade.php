<ul>
  <li class="orders__id">{{ $order->id }}</li>
  <li class="orders__note">{{ $order->note }}</li>
  <li class="orders__sum">{{ $order->sum }} руб.</li>
  <li class="orders__status">{{ Helper::getStatus($order->status) }}</li>
  <li class="orders__created">@datetime($order->created_at )</li>
  <a class="orders__cancel" href="/cancel-order">Отмена заказа</a>
  {{-- @each('partial.order-products', $order->orderProduct, 'orderProduct') --}}
</ul>