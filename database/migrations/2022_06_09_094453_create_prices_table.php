<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->id('price_id');
            $table->string('title')->require();
            $table->string('designation')->require();
            $table->string('price')->require();
            $table->string('item1')->require();
            $table->string('item2')->require();
            $table->string('item3')->require();
            $table->string('item4')->require();
            $table->string('item5')->require();
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
        Schema::dropIfExists('prices');
    }
}
