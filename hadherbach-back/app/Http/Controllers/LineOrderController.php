<?php

namespace App\Http\Controllers;
use DB ;
use App\LineOrder;
use Illuminate\Http\Request;
use Session;
session_start();


class LineOrderController extends Controller
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
        $data['line_order_id'] = $request->line_order_id;
    	$data['line_order_discount'] = $request->line_order_discount;
        $data['product_qte'] = $request->product_qte;
        $data['user_id'] = $request->user_id;
        $data['order_id'] = $request->order_id;
        $data['product_id'] = $request->product_id;
        DB::table('line_orders')->insert($data);
    	Session::put('message', 'line_order addedd successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LineOrder  $lineOrder
     * @return \Illuminate\Http\Response
     */
    public function show(LineOrder $lineOrder)
    {
        $lineorders = LineOrder::all();
        return response()->json($lineorders);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LineOrder  $lineOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(LineOrder $lineOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LineOrder  $lineOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LineOrder $line_order_id)
    {
        //$line_order_id=1;
        $data = array();
        $data['line_order_id'] = $request->line_order_id;
    	$data['line_order_discount'] = $request->line_order_discount;
        $data['product_qte'] = $request->product_qte;
        $data['user_id'] = $request->user_id;
        $data['order_id'] = $request->order_id;
        $data['product_id'] = $request->product_id;
        DB::table('line_orders')
            ->where('line_order_id', $line_order_id)
            ->update($data);
            Session::put('message', 'line_orders updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LineOrder  $lineOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(LineOrder $line_order_id)
    {
        $line_order_id=1;
        DB::table('line_orders')
        ->where('line_order_id', $line_order_id)
        ->delete();
        Session::get('message', 'line_orders deleted successfully! ');
    }
}
