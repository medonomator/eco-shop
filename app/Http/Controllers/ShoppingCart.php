<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\ShoppingCart as ShoppingCartModel;

class ShoppingCart extends Controller
{

    /**
     * Get current userId
     *
     * @return int
     */
    public function getUserId()
    {
        return auth('web')->user()->id;
    }

    /**
     * Display the products for shopping Cart
     *
     * @return \Illuminate\Http\Response
     */
    public function getProductsForShoppingCart()
    {
        $shopCarts = ShoppingCartModel::where('client_id', $this->getUserId())->with('product')->get();

        $amount = 0;
        foreach($shopCarts as $item) {
            if(empty($item->product->price)) {
                $amount = $amount + $item->product->old_price;
            } else {
                $amount = $amount + $item->product->price;
            }
        }

        return view('shopping-cart', [
            'shopCarts' => $shopCarts,
            'amount' => $amount
        ]);
    }

    /**
     * Add good to shopping cart
     *
     * @return \Illuminate\Http\Response
     */
    public function addShoppingCart(Request $request)
    {
        ShoppingCartModel::create([
            'client_id' => $this->getUserId(),
            'product_id' => $request->goodId,
            'quantity' => $request->quantity
        ]);
        return 'ok';
    }

    /**
     * Delete good from shopping cart
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteItem(Request $request)
    {
        ShoppingCartModel::destroy($request->goodId);
        return $this->getProductsForShoppingCart();
    }

    /**
     * Clear the shopping cart
     *
     * @return \Illuminate\Http\Response
     */
    public function clearShoppingCart()
    {
        ShoppingCartModel::query()->delete();
        return $this->getProductsForShoppingCart();
    }

    /**
     * Place order
     *
     * @return \Illuminate\Http\Response
     */
    public function placeOrder(Request $request)
    {
        $request->validate([
            'amount' => 'required|max:255',
            'payment' => 'required',
            'delivery' => 'required',
        ]);

        $shopCarts = ShoppingCartModel::where('client_id', $this->getUserId())->with('product')->get();

        $newOrder = Order::create([
            'user_id' => $this->getUserId(),
            'note' => "Test Order",
            'sum' => $request->amount,
            'currency' => 'rub'
        ]);

        foreach ($shopCarts as $item) {
            OrderProduct::create([
                'order_id' => $newOrder->id,
                'product_id' => $item->product_id,
                "qty" => 1,
                "title" => 'Test title',
                "price" =>  100
            ]);
        }

        // перенаправить на страницу платежной системы c данными о заказе
        // и далее ждать возврата на returnPage
        return 'placeOrder';
    }

    /**
     * Return page
     *
     * @return \Illuminate\Http\Response
     */
    public function returnPage()
    {
        // обработать ошибку если такая придет
        // Если успешный ответ, тогда Сказать спасибо за заказ вываести номер заказа и сказать что
        // можете отследить статус заказа в Личном кабинете
        return 'returnPage';
    }
}
