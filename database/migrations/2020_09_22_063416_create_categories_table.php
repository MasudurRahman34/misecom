<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
        
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->string('thumbnail_image')->nullable();
            $table->string('url')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->string('offer_id')->nullable()->comment('offer_table');
            $table->unsignedBigInteger('section_id')->nullable()->comment('section_table');
            $table->unsignedBigInteger('category_id')->nullable()->comment('catagory_table');
            $table->unsignedBigInteger('user_id')->nullable()->comment('user_table');
            //$table->unsignedBigInteger('parent_id ')->nullable();
            //$table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            //$table->foreign('parent_id')->references('id')->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('categories');
    }
}
