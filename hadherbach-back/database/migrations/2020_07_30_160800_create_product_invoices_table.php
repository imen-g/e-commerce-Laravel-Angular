<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_invoices', function (Blueprint $table) {
            $table->bigIncrements('product_invoice_id');
            $table->boolean('state');
            $table->integer('product_invoice_discount');
            $table->integer('product_invoice_tva');
            $table->string('product_invoice_total',100);
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('order_id')->on('orders'); 
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            
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
        Schema::dropIfExists('product_invoices');
    }
}
