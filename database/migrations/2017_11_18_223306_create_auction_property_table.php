<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuctionPropertyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auction_property', function (Blueprint $table) {
            $table->integer('auction_id')->unsigned()->nullable();
            $table->foreign('auction_id')->references('id')
                ->on('auctions')
                ->onDelete('cascade');

            $table->integer('property_id')->unsigned()->nullable();
            $table->foreign('property_id')->references('id')
                ->on('properties')->onDelete('cascade');

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
        Schema::dropIfExists('auction_property');
    }
}