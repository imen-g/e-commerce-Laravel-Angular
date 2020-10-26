<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_invoices', function (Blueprint $table) {
            $table->bigIncrements('job_invoice_id');
            $table->boolean('state');
            $table->integer('job_invoice_discount');
            $table->integer('job_invoice_tva');            
            $table->decimal('job_invoice_total', 20, 3);   
            $table->unsignedBigInteger('job_id');// demande client(user)
            $table->foreign('job_id')->references('job_id')->on('jobs'); 
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('provider_id');
            $table->foreign('provider_id')->references('provider_id')->on('providers');
            $table->unsignedBigInteger('proposal_id');
            $table->foreign('proposal_id')->references('proposal_id')->on('proposals');
           
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
        Schema::dropIfExists('job_invoices');
    }
}
