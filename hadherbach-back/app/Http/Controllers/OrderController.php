<?php

namespace App\Http\Controllers;
use DB;
use App\Order;
use App\LineOrder;
use Illuminate\Http\Request;
use Session;
session_start();

class OrderController extends Controller
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
    public function store(Request $request)
    {
        $data = array();
        $data['order_id'] = $request->order_id;
    	$data['orderDesc'] = $request->orderDesc;
        $data['order_fees_total'] = $request->order_fees_total;
        $data['paiement_mode'] = $request->paiement_mode;
        $data['user_id'] = $request->user_id;
        DB::table('orders')->insert($data);
    	Session::put('message', 'order addedd successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order_id)
    {
      // $order_id=1;
       $panier = LineOrder::take($order_id)->get();
        return response()->json($panier);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order_id)
    {   
        //$order_id=1;
        $data = array();
        $data['order_id'] = $request->order_id;
    	$data['orderDesc'] = $request->orderDesc;
        $data['order_fees_total'] = $request->order_fees_total;
        $data['paiement_mode'] = $request->paiement_mode;
        $data['user_id'] = $request->user_id;
        DB::table('orders')
            ->where('order_id', $order_id)
            ->update($data);
            Session::put('message', 'order updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //$order_id=1;
        DB::table('orders')
        ->where('order_id', $order_id)
        ->delete();
        Session::get('message', 'order deleted successfully! ');
    }
}
