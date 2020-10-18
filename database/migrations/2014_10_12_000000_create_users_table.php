<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            //user_id-address
            $table->string('ip_address')->nullable();

            //billind-details
            $table->string('Billing_Details_first_name')->nullable();
            $table->string('Billing_Details_name')->nullable();
            $table->string('Billing_Details_address')->nullable();
            $table->string('Billing_Details_contact_number')->nullable();
            $table->string('Billing_Details_city')->nullable();
            $table->string('Billing_Details_post_code')->nullable();
            $table->string('Billing_Details_country')->nullable();
            $table->string('Billing_Details_region')->nullable();

            $table->rememberToken();
            //soft-delete
            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
}
