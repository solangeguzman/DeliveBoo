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
            $table->id();
            $table->timestamps();
            $table->string('customer_name', 50);
            $table->string('customer_surname', 50);
            $table->string('customer_address', 255);
            $table->string('customer_email', 255);
            $table->string('customer_phone', 20);
            $table->double('total_price', 6, 2);
            $table->string('status', 20);
            $table->string('discount', 50)->nullable();
            $table->text('notes')->nullable();
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
