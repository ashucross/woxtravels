<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HotelsData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_data', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->text('name');
            $table->text('categoryName');
            $table->text('destinationCode');
            $table->text('destinationName');
            $table->text('minRate');
            $table->text('maxRate');
            $table->text('currency');
            $table->text('chain');
            $table->text('address');
            $table->text('postalCode');
            $table->text('email');
            $table->text('phones');
            $table->text('ranking');
            $table->text('images');
            $table->text('web');
            $table->text('response_data');
            $table->integer('noDecimalPrice');
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
        //
    }
}
