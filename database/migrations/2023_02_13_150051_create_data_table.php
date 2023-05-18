<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        //Hãng
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        //Loại sản phẩm
        Schema::create('product_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        //Sản phẩm
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('price');
            $table->longText('description');
            $table->longText('descriptionDetail');
            $table->string('isFeatured');
            $table->string('isBestSeller');
            $table->unsignedBigInteger('product_type_id');
            $table->foreign('product_type_id')->references('id')->on('product_types');
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands');
        });

        //Hình ảnh sản phẩm
        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
        });

        //Khách hàng
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('role')->default('client');
            $table->timestamps();
        });

        //Giỏ hàng
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->float('total');
            $table->float('shipping')->default(5);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });

        //Giỏ hàng chi tiết
        Schema::create('cart_details', function (Blueprint $table) {
            $table->id();
            $table->float('price');
            $table->integer('quantity');
            $table->unsignedBigInteger('cart_id');
            $table->foreign('cart_id')->references('id')->on('carts');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
        });

        //Blog
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('content');
            $table->string('image');
            $table->date('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brands');
        Schema::dropIfExists('product_types');
        Schema::dropIfExists('products');
        Schema::dropIfExists('discount');
        Schema::dropIfExists('product_images');
        Schema::dropIfExists('discount_details');
        Schema::dropIfExists('reviews');
        Schema::dropIfExists('customers');
        Schema::dropIfExists('carts');
        Schema::dropIfExists('cart_details');
        Schema::dropIfExists('blogs');
        Schema::dropIfExists('contacts');
        Schema::dropIfExists('newsletters');
    }
};
