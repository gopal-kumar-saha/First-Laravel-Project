<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cartorders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone');
            $table->integer('customer_country_id'); 
            $table->integer('customer_city_id');
            $table->integer('discount');
            $table->float('sub_total');
            $table->float('total');
            $table->string('customer_address');
            $table->string('customer_postal_code');
            $table->text('massage');
            $table->integer('payment_option')->comment('1=credit_card, 2=COD');
            $table->integer('payment_status')->comment('1=DUE, 2=PAID');
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
        Schema::dropIfExists('cartorders');
    }
}
