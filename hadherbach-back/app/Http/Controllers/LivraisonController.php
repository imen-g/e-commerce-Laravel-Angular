<?php

namespace App\Http\Controllers;
use DB;
use App\Livraison;
use Illuminate\Http\Request;
use Session;
session_start();

class LivraisonController extends Controller
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
        $data['livraison_id'] = $request->livraison_id;
    	$data['state'] = $request->state;
        $data['begin_livraison'] = $request->begin_livraison;
        $data['end_livraison'] = $request->end_livraison;
        $data['product_invoice_id'] = $request->product_invoice_id;
        $data['provider_id'] = $request->provider_id;
        DB::table('livraisons')->insert($data);
    	Session::put('message', 'livraison addedd successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Livraison  $livraison
     * @return \Illuminate\Http\Response
     */
    public function show(Livraison $livraison_id)
    {
        $livraison = Livraison::all();
        return response()->json($livraison);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Livraison  $livraison
     * @return \Illuminate\Http\Response
     */
    public function edit(Livraison $livraison)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Livraison  $livraison
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Livraison $livraison_id)
    {
        $livraison_id=1;
        $data = array();
        $data['livraison_id'] = $request->livraison_id;
    	$data['state'] = $request->state;
        $data['begin_livraison'] = $request->begin_livraison;
        $data['end_livraison'] = $request->end_livraison;
        $data['product_invoice_id'] = $request->product_invoice_id;
        $data['provider_id'] = $request->provider_id;
        DB::table('livraisons')
            ->where('livraison_id', $livraison_id)
            ->update($data);
            Session::put('message', 'livraison updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Livraison  $livraison
     * @return \Illuminate\Http\Response
     */
    public function destroy(Livraison $livraison_id)
    {
        $livraison_id=1;
        DB::table('livraisons')
        ->where('livraison_id', $livraison_id)
        ->delete();
        Session::get('message', 'livraison deleted successfully! ');
    }
}
