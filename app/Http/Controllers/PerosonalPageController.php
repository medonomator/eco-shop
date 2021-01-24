<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderProduct;

class PerosonalPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orders = Order::where('user_id', auth('web')->user()->id)->with('orderProduct')->get();

        return view('personal', [
            'orders' => $orders 
        ]);
    }
}
