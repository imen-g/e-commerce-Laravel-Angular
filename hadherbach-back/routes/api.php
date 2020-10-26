<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});




//secteur
Route::post('/secteur','SectorController@store');//->middleware('auth');
Route::post('/secteurUpdate','SectorController@update');//->middleware('auth');
Route::get('/secteurDelete','SectorController@destroy');//->middleware('auth');
Route::get('/secteurShow','SectorController@show');//->middleware('auth');

//categorie
Route::post('/categorie','CategorieController@store');//->middleware('auth');
Route::post('/categorieUpdate','CategorieController@update');//->middleware('auth');
Route::get('/categorieDelete','CategorieController@destroy');//->middleware('auth');
Route::get('/categorieShow','CategorieController@show');//->middleware('auth');
Route::get('/categorieShowProduct','CategorieController@show_product_by_category');//->middleware('auth');


//product
Route::post('/product','ProductController@store');//->middleware('auth');
Route::get('/productShow','ProductController@show');//->middleware('auth');
Route::post('/productUpdate','ProductController@update');//->middleware('auth');
Route::get('/productDelete','ProductController@destroy');//->middleware('auth');


//order
Route::get('/orderShow','OrderController@show');//->middleware('auth');
Route::post('/order','OrderController@store');//->middleware('auth');
Route::post('/orderUpdate','OrderController@update');//->middleware('auth');
Route::get('/orderDelete','OrderController@destroy');//->middleware('auth');

//order_line
Route::get('/lineorderShow','LineOrderController@show');//->middleware('auth');
Route::post('/lineorder','LineOrderController@store');//->middleware('auth');
Route::post('/lineorderUpdate','LineOrderController@update');//->middleware('auth');
Route::get('/lineorderDelete','LineOrderController@destroy');//->middleware('auth');


//product_invoices
Route::get('/productinvShow','ProductInvoiceController@show');//->middleware('auth');
Route::post('/productinv','ProductInvoiceController@store');//->middleware('auth');
Route::post('/productinvUpdate','ProductInvoiceController@update');//->middleware('auth');
Route::get('/productinvDelete','ProductInvoiceController@destroy');//->middleware('auth');


//livraison
Route::get('/livraisonvShow','LivraisonController@show');//->middleware('auth');
Route::post('/livraison','LivraisonController@store');//->middleware('auth');
Route::post('/livraisonUpdate','LivraisonController@update');//->middleware('auth');
Route::get('/livraisonDelete','LivraisonController@destroy');//->middleware('auth');

