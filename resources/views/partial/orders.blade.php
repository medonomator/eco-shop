<li>
  <div class="orders__id">{{ $order->id }}</div>
  <div class="orders__note">{{ $order->note }}</div>
  <div class="orders__sum">{{ $order->sum }} руб.</div>
  <div class="orders__status">{{ Helper::getStatus($order->status) }}</div>
  <div class="orders__created">@datetime($order->created_at )</div>
  <a class="orders__cancel" href="/cancel-order">Отмена заказа</a>
</li>