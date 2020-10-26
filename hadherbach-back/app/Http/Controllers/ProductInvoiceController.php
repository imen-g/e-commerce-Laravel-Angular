<?php

namespace App\Http\Controllers;
use DB;
use App\ProductInvoice;
use App\Product;
use App\LineOrder;
use App\Order;
use Illuminate\Http\Request;
use Session;
session_start();


class ProductInvoiceController extends Controller
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
    public function store(Request $request , ProductInvoice $order_id , Product $product_id)
    {   $order_id=1;
        $product_id=1;
        $data = array();
        $data['product_invoice_id'] = $request->product_invoice_id;
        $data['state'] = $request->state;
        $discount = DB::table('orders')
         ->select('line_orders.line_order_discount')
         ->join('line_orders', 'orders.order_id', '=', 'line_orders.order_id')
         ->where('line_orders.order_id', $order_id)
         ->sum('line_order_discount');
        $data['product_invoice_discount'] = $discount;
        $data['product_invoice_tva'] = $request->product_invoice_tva;
        $total = DB::table('products')
        ->selectRaw('(products.product_price * line_orders.product_qte) as total')
        ->join('line_orders', 'products.product_id', '=', 'line_orders.product_id')
        ->where('line_orders.product_id', $product_id)
        ->get('(total *$discount)/100');
    
        $data['product_invoice_total'] = $total ;
        $data['order_id'] = $request->order_id;
        $data['user_id'] = $request->user_id;
        DB::table('product_invoices')->insert($data);
    	Session::put('message', 'product_invoice addedd successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductInvoice  $productInvoice
     * @return \Illuminate\Http\Response
     */
    public function show(ProductInvoice $product_invoice_id)
    {
        $ordersinv = ProductInvoice::all();
        return response()->json($ordersinv);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductInvoice  $productInvoice
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductInvoice $productInvoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductInvoice  $productInvoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductInvoice $product_invoice_id  , Product $product_id)
    {   
         $product_invoice_id=$request->product_invoice_id;
         $product_id=$request->product_id;
      
        $data = array();
        $data['product_invoice_id'] = $request->product_invoice_id;
        $data['state'] = $request->state;
        $discount = DB::table('orders')
         ->select('line_orders.line_order_discount')
         ->join('line_orders', 'orders.order_id', '=', 'line_orders.order_id')
         ->where('line_orders.order_id', $request->order_id)
         ->sum('line_order_discount');
        $data['product_invoice_discount'] = $discount;
        $data['product_invoice_tva'] = $request->product_invoice_tva;
        $total = DB::table('products')
        ->selectRaw('(products.product_price * line_orders.product_qte) as total')
        ->join('line_orders', 'products.product_id', '=', 'line_orders.product_id')
        ->where('line_orders.product_id', $product_id)
        ->get('(total *$discount)/100');
    
        $data['product_invoice_total'] = $total ;
        $data['order_id'] = $request->order_id;
        $data['user_id'] = $request->user_id;
        DB::table('product_invoices')
            ->where('product_invoice_id', $product_invoice_id)
            ->update($data);
            Session::put('message', 'product _ invoice updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductInvoice  $productInvoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductInvoice $product_invoice_id)
    {
        $product_invoice_id=1;
        DB::table('product_invoices')
        ->where('product_invoice_id', $product_invoice_id)
        ->delete();
        Session::get('message', 'order deleted successfully! ');
    }
}
