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
            $table->id();
            $table->string('product_name');
            $table->string('category_id');
            $table->string('brand_id');
            $table->string('product_code');
            $table->string('product_description');
            $table->string('product_quantity');
            $table->string('product_price');
            $table->string('brand_image1');
            $table->string('brand_image2');
            $table->string('brand_image3');
            $table->string('starus')->default(1);

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
