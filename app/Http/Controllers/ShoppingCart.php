<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
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
     * Display the products for Shopping Cart
     *
     * @return \Illuminate\Http\Response
     */
    public function getProductsForShoppingCart()
    {
        $shopCarts = ShoppingCartModel::where('client_id', $this->getUserId())->with('product')->get();
        return view('shopping-cart', [
            'shopCarts' => $shopCarts
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
}
