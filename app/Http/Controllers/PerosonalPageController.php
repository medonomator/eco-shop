<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Client;

class PerosonalPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('personal');
    }

    /**
     * Display personal ot the orders.
     *
     * @return \Illuminate\Http\Response
     */
    public function showOrders()
    {
        $orders = Order::where('user_id', auth('web')->user()->id)->with('orderProduct')->get();

        return view('personal-orders', [
            'orders' => $orders 
        ]);
    }

    /**
     * Сancel order.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelOrder($orderId)
    {
        $order = Order::where([
            'user_id' => auth('web')->user()->id,
            'id' => $orderId
        ])->first();

        if(!$order) {
            abort(403);
        }

        Order::destroy($order->id);     
        
        return $this->showOrders();
    }

    /**
     * The Personal data change
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Responsed
     */
    public function personalChange(Request $request)
    {
        // need validate

        // $request->email
        // $request->name
        if($request->file('image')) {
            $path = $request->file('image')->store('public'); 

            $client = Client::where('id', auth()->user()->id)->first();

            if($client->avatarUrl) {
                \Storage::delete($client->avatarUrl);
                $client->avatarUrl = $path;
                $client->save();
            } else {
                $client->avatarUrl = $path;
                $client->save();
            }
        }
        
        return redirect()->back();
    }
}
