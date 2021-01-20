<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ShippingCart;

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
     * Display the products for Shipping Cart
     *
     * @return \Illuminate\Http\Response
     */
    public function getProductsForShippingCart(Request $request)
    {
        $items = ShippingCart::where('client_id', $this->getUserId())->get();
        
        // return view('shopping-cart', [
        //     'products' => Product::paginate(15)
        // ]);
    }

    /**
     * Add good to shipping cart
     *
     * @return \Illuminate\Http\Response
     */
    public function addShippingCart(Request $request)
    {
        ShippingCart::create([
            'client_id' => $this->getUserId(),
            'product_id' => $request->goodId,
            'quantity' => $request->quantity
        ]);

        return 'ok';
    }

    /**
     * Delete good from shipping cart
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteItem(Request $request)
    {
        ShippingCart::where('id',$request->goodId);
        return 'ok';
    }
}
