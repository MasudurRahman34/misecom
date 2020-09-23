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
            $table->bigIncrements('id');
            $table->string('product_title',100);
            $table->text('product_description',255);
            $table->string('slug');
            $table->integer('stockAmount')->default(1);
            $table->boolean('stock')->default(true)->comment('1=true, 0= false');
            $table->integer('Price');
            $table->integer('offerPrice')->nullable();
            $table->tinyInteger('status')->default(0);
            


            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id');
            //$table->unsignedBigInteger('user_id');

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();  
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
