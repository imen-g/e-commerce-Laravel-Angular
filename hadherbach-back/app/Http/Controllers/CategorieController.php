<?php

namespace App\Http\Controllers;
use DB;
use App\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Session;
session_start();

class CategorieController extends Controller
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
        $data['categorie_id'] = $request->categorie_id;
    	$data['category_name'] = $request->category_name;
    	$data['url_categorie_image'] = $request->url_categorie_image;
        $data['user_id'] = $request->user_id;
        $data['sector_id'] = $request->sector_id;
    	

    	$image = $request->file('url_categorie_image');
    	if ($image) {
    		$image_name = str::random(20);
    		$ext = strtolower($image->getClientOriginalExtension());
    		$image_full_name = $image_name. '.'.$ext;
    		$upload_path = 'image/';
    		$image_url = $upload_path.$image_full_name;
    		$success = $image->move($upload_path,$image_full_name);
    		if ($success) {
    			$data['url_categorie_image'] = $image_url;

    			DB::table('categories')->insert($data);
    			Session::put('message', 'categorie addedd successfully!');
    			
            }}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $categorie)
    {
        $categories = Categorie::all();
        return response()->json($categories);
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit(Categorie $categorie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categorie $categorie_id)
    {
       // $categorie_id=1;
        $data = array();
        $data['categorie_id'] = $request->categorie_id;
    	$data['category_name'] = $request->category_name;
    	$data['url_categorie_image'] = $request->url_categorie_image;
        $data['user_id'] = $request->user_id;
        $data['sector_id'] = $request->sector_id;
    	

    	$image = $request->file('url_categorie_image');
    	if ($image) {
    		$image_name = str::random(20);
    		$ext = strtolower($image->getClientOriginalExtension());
    		$image_full_name = $image_name. '.'.$ext;
    		$upload_path = 'image/';
    		$image_url = $upload_path.$image_full_name;
    		$success = $image->move($upload_path,$image_full_name);
    		if ($success) {
    			$data['url_categorie_image'] = $image_url;}}

        DB::table('categories')
            ->where('categorie_id', $categorie_id)
            ->update($data);
            Session::put('message', 'categorie updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorie $categorie_id)
    {
         $categorie_id=1;
         DB::table('categories')
         ->where('categorie_id', $categorie_id)
         ->delete();
         Session::get('message', 'categorie deleted successfully! ');
    }


    public function show_product_by_category(Categorie $categorie_id){
       // $categorie_id=1;
        $product_by_category = DB::table('products')
            ->join('categories', 'products.categorie_id', '=', 'categories.categorie_id')
            ->select('products.*', 'categories.category_name')
            ->where('categories.categorie_id',$categorie_id)
            ->limit(12)
            ->get();
            return ($product_by_category);

            
    }

}
