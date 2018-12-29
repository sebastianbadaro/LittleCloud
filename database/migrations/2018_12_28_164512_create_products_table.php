<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('code')->unique();
            $table->float('price');
            $table->string('size');
            $table->string('description');
            $table->float('ageTarget');
            $table->integer('stock');
            $table->timestamps();
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('brand_id');
            $table->unsignedInteger('season_id');
            $table->unsignedInteger('productGender_id');







           $table->foreign('category_id')->references('id')->on('categories');
           $table->foreign('brand_id')->references('id')->on('brands');
           $table->foreign('season_id')->references('id')->on('seasons');
           $table->foreign('productGender_id')->references('id')->on('productgenders');
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
