<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FeedbacksProduct;
use App\Http\   Requests\FeedbacksProductRequest;

class FeedbacksProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FeedbacksProductRequest $request)
    {
        FeedbacksProduct::create([
            'client_id' => auth()->user()->id,
            'product_id' => $request->productId,
            'feedback' => $request->feedback 
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($clientId, $feedbackId)
    {
        if(!auth()->user()->id === (int) $clientId) {
            return response()->json(['status' => 'Forbidden']);
        }
        FeedbacksProduct::destroy($feedbackId);
  
        return response()->json(["status" => 'ok']);
    }
}
