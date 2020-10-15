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
            $table->string('sku');
            $table->string('product_title',255);
            $table->text('product_description',255)->nullable();
            $table->string('slug');
            $table->integer('stock_amount')->default(0);
            $table->boolean('stock')->default(true)->comment('1=true, 0= false');
            $table->decimal('buy_price',8,2);
            $table->decimal('sell_price',8,2);
            $table->decimal('offer_price',8,2);
            $table->string('sleeve',50)->nullable();
            $table->string('color',150)->nullable();
           // $table->text('description',50);
            //$table->decimal('price',8,2);
            
            $table->tinyInteger('status')->default(0);
            $table->integer('offer')->default(0);
            $table->unsignedBigInteger('section_id')->nullable()->comment('section_table');
            $table->unsignedinteger('supplier_id')->nullable();
            $table->unsignedinteger('fabric_id')->nullable();
            $table->unsignedinteger('category_id')->nullable();
            $table->unsignedinteger('brand_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();


            //$table->unsignedBigInteger('user_id');
            $table->string('url')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();

            // $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            // $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
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
