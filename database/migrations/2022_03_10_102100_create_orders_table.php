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
            $table->enum('type', ['car', 'service', 'unavailable_car']);
            $table->string('status')->default('new');
            $table->string('name');
            $table->string('phone');
            $table->double('price')->nullable();
            $table->string('car_name')->nullable();

            $table->unsignedBigInteger('client_id')->nullable();
            $table->unsignedBigInteger('car_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('bank_id')->nullable();

            $table->dateTime('opened_at')->nullable();
            $table->unsignedBigInteger('opened_by')->nullable();

            // $table->foreign('client_id')->references('id')->on('vendors')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('car_id')->references('id')->on('cars')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('bank_id')->references('id')->on('banks')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('opened_by')->references('id')->on('employees')->onUpdate('cascade')->onDelete('cascade');

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
