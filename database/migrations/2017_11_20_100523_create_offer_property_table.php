<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfferPropertyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer_property', function (Blueprint $table) {
            $table->integer('offer_id')->unsigned()->nullable();
            $table->foreign('offer_id')->references('id')
                ->on('offers')
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
        Schema::dropIfExists('offer_property');
    }
}