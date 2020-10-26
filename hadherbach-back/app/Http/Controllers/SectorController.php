<?php

namespace App\Http\Controllers;
use DB;
use App\Sector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Session;
session_start();

class SectorController extends Controller
{
    /*public function __construct()
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
    {$data = array();
        $data['sector_id'] = $request->sector_id;
    	$data['sector_name'] = $request->sector_name;
    	$data['url_sector_image'] = $request->url_sector_image;
    	$data['user_id'] = $request->user_id;
    	

    	$image = $request->file('url_sector_image');
    	if ($image) {
    		$image_name = str::random(20);
    		$ext = strtolower($image->getClientOriginalExtension());
    		$image_full_name = $image_name. '.'.$ext;
    		$upload_path = 'image/';
    		$image_url = $upload_path.$image_full_name;
    		$success = $image->move($upload_path,$image_full_name);
    		if ($success) {
    			$data['url_sector_image'] = $image_url;

    			DB::table('sectors')->insert($data);
    			Session::put('message', 'sector addedd successfully!');
    			
            }}
           
    			
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function show(Sector $sector)
    {
        $sectors = Sector::all();
        return response()->json($sectors);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function edit(Sector $sector)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sector $sector_id)
    {  // $sector_id=1;
        $data = array();
        $data['sector_id'] = $request->sector_id;
    	$data['sector_name'] = $request->sector_name;
    	$data['url_sector_image'] = $request->url_sector_image;
        $data['user_id'] = $request->user_id;
        
        $image = $request->file('url_sector_image');
    	if ($image) {
    		$image_name = str::random(20);
    		$ext = strtolower($image->getClientOriginalExtension());
    		$image_full_name = $image_name. '.'.$ext;
    		$upload_path = 'image/';
    		$image_url = $upload_path.$image_full_name;
    		$success = $image->move($upload_path,$image_full_name);
    		if ($success) {
    			$data['url_sector_image'] = $image_url;}}

        DB::table('sectors')
            ->where('sector_id', $sector_id)
            ->update($data);
            Session::put('message', 'sector updated successfully!!');
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sector $sector_id)
    {  //$sector_id=1;
        DB::table('sectors')
        ->where('sector_id', $sector_id)
        ->delete();
        Session::get('message', 'sector deleted successfully! ');
    }
}
