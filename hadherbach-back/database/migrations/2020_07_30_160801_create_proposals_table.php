<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposals', function (Blueprint $table) {
            
            $table->bigIncrements('proposal_id');
            $table->text('proposal_Desc');            
            $table->decimal('proposal_price', 20, 3);             
            $table->text('url_proposal_image');
            $table->unsignedBigInteger('provider_id');
            $table->foreign('provider_id')->references('provider_id')->on('providers');
            $table->unsignedBigInteger('job_id');// demande client(user)
            $table->foreign('job_id')->references('job_id')->on('jobs'); 
            
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
        Schema::dropIfExists('proposals');
    }
}
