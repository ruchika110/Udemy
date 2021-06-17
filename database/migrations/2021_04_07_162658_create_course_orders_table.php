<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_orders', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('user_email')->nullable();
            $table->string('name')->nullable();
            $table->string('country')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('pincode')->nullable();
            $table->string('phone')->nullable();
            $table->string('order_note')->nullable();
            $table->string('order_status')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('total')->nullable();
            $table->string('coupon_code')->nullable();
            $table->string('coupon_amount')->nullable();
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
        Schema::dropIfExists('course_orders');
    }
}
