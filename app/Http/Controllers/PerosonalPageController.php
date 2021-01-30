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
    public function showOrders(Request $request)
    {
        $orders = Order::where('user_id', auth('web')->user()->id)->with('orderProduct')->get();

        return view('personal-orders', [
            'orders' => $orders 
        ]);
    }

    /**
     * The Personal data change
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Responsed
     */
    public function personalChange(Request $request)
    {
        dd($request->file('image') );
        if($request->file('image') );
        $path = $request->file('image')->store('personal');

        // dd(Client::find(auth()->user()->id));

        return view('personal');
    }
}
