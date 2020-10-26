<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('product_id');
            $table->text('productRef');
            $table->text('productName');           
            $table->text('productDesc');
            $table->text('url_product_image');
            $table->decimal('product_price', 20, 3);    
            $table->decimal('product_fees', 20, 3);   
            $table->bigInteger('productStock');
            $table->text('productColor');
            $table->bigInteger('productSize');
            $table->bigInteger('productWheight');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('categorie_id');
            $table->foreign('categorie_id')->references('categorie_id')->on('categories');    
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
