<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_times', function (Blueprint $table) {
            $table->id();

            $table->string('task');
            $table->string('user');

            $table->string('delivered_app')->nullable();
            $table->string('viewed_app')->nullable();
            $table->string('sent_sms')->nullable();
            $table->string('delivered_sms')->nullable();

            $table->boolean('state')->default(0);


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
        Schema::dropIfExists('shipping_times');
    }
}
