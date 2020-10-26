<?php

namespace App\Http\Controllers;
use DB;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;
session_start();


class ProductController extends Controller
{
   /* public function __construct()
    {
        $this->middleware('auth');

        
    }
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
    public function create(request $request)
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
        $data['product_id'] = $request->product_id;
    	$data['productRef'] = $request->productRef;
    	$data['productName'] = $request->productName;
        $data['productDesc'] = $request->productDesc;
        $data['url_product_image'] = $request->url_product_image;
        $data['product_price'] = $request->product_price;
        $data['product_fees'] = $request->product_fees;
        $data['productStock'] = $request->productStock;
        $data['productColor'] = $request->productColor;
        $data['productSize'] = $request->productSize;
        $data['productWheight'] = $request->productWheight;
        $data['user_id'] = $request->user_id;
        $data['categorie_id'] = $request->categorie_id;

    	$image = $request->file('url_product_image');
    	if ($image) {
    		$image_name = str::random(20);
    		$ext = strtolower($image->getClientOriginalExtension());
    		$image_full_name = $image_name. '.'.$ext;
    		$upload_path = 'image/';
    		$image_url = $upload_path.$image_full_name;
    		$success = $image->move($upload_path,$image_full_name);
    		if ($success) {
    			$data['url_product_image'] = $image_url;

    			DB::table('products')->insert($data);
    			Session::put('message', 'product addedd successfully!');
    			
            }}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product_id)
    {
        $products = Product::all();
        return response()->json($products);
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product_id)
    {
        $product_id=1;
        $data = array();
        $data['product_id'] = $request->product_id;
    	$data['productRef'] = $request->productRef;
    	$data['productName'] = $request->productName;
        $data['productDesc'] = $request->productDesc;
        $data['url_product_image'] = $request->url_product_image;
        $data['product_price'] = $request->product_price;
        $data['product_fees'] = $request->product_fees;
        $data['productStock'] = $request->productStock;
        $data['productColor'] = $request->productColor;
        $data['productSize'] = $request->productSize;
        $data['productWheight'] = $request->productWheight;
        $data['user_id'] = $request->user_id;
        $data['categorie_id'] = $request->categorie_id;
    	

    	$image = $request->file('url_product_image');
    	if ($image) {
    		$image_name = str::random(20);
    		$ext = strtolower($image->getClientOriginalExtension());
    		$image_full_name = $image_name. '.'.$ext;
    		$upload_path = 'image/';
    		$image_url = $upload_path.$image_full_name;
    		$success = $image->move($upload_path,$image_full_name);
    		if ($success) {
    			$data['url_product_image'] = $image_url;}}

        DB::table('products')
            ->where('product_id', $product_id)
            ->update($data);
            Session::put('message', 'product updated successfully!!');
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product_id)
    {
       // $product_id=1;
        DB::table('products')
        ->where('product_id', $product_id)
        ->delete();
        Session::get('message', 'product deleted successfully! ');
    }


}
