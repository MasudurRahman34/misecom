<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductVariantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_variants', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->string('sku');
            $table->string('size'); 
            $table->integer('quantity'); 
            $table->unsignedBigInteger('product_id'); 
            //$table->unsignedBigInteger('product_id'); 
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('stock_type')->default('default');
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('product_variants');
    }
}
