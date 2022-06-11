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
            $table->id('order_id');
            $table->string('f_name')->require();
            $table->string('l_name')->require();
            $table->string('email')->require();
            $table->string('phone')->require();
            $table->string('address_1')->require();
            $table->string('address_2')->nullable();
            $table->string('paymentMethod')->require();
            $table->string('send_number')->require();
            $table->string('secretKey')->require();
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('orders');
    }
}
