<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesenqurisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packagesenquris', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('cname');
            $table->string('email');
            $table->string('residence');
            $table->string('city');
            $table->string('phone');
            $table->string('package_id');
            $table->integer('tGuest')->nullable();
            $table->string('tMonth')->nullable();
            $table->text('aMessage')->nullable();
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
        Schema::dropIfExists('packagesenquris');
    }
}
