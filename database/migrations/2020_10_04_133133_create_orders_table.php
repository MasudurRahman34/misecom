<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');

            //user_ip_adderss
            $table->string('ip_address')->nullable();

            //delivery_details
            $table->string('delivery_clint_name')->nullable();
            $table->string('delivery_clint_phone_number')->nullable();
            $table->string('delivery_clint_emailAddress')->nullable();
            $table->string('delivery_shipping_address_1')->nullable();
            $table->string('delivery_shipping_address_2')->nullable();
            $table->string('delivery_city')->nullable();
            $table->string('delivery_post_code')->nullable();
            $table->string('delivery_country')->nullable();
            $table->string('delivery_region')->nullable();
            $table->text('message')->nullable();

            //payment-option
            $table->decimal('totalprice',8,2);
            $table->string('payment_option')->nullable();
            $table->boolean('is_paid')->default(0);
            $table->boolean('is_completed')->default(0);
            $table->boolean('is_seen_by_admin')->default(0);
            $table->string('transaction_id')->nullable();
 

            //Auth-check_id
            $table->unsignedBigInteger('user_id')->nullable();
            //foreign-key-relation-ship
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
            //soft-delete
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
        Schema::dropIfExists('orders');
    }
}
