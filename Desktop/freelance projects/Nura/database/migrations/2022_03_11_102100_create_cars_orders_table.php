<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars_orders', function (Blueprint $table) {

            $table->id();

            $table->enum('type',['individual','organization']);
            $table->enum('payment_type',['cash','finance']);

            // organization fields

            // cash or finance
            $table->text('cars')->nullable(); // json array [ [ car_id , car_name , count ] , [ car_id , car_name , count ] ]
            $table->string('organization_name')->nullable();
            $table->string('organization_email')->nullable();
            $table->string('organization_activity')->nullable();
            $table->string('organization_age')->nullable();
            $table->string('organization_location')->nullable();

            // organization fields

            // individual fields

            // finance
            $table->double('salary')->nullable();
            $table->double('commitments')->nullable();
            $table->boolean('having_loan')->nullable();
            $table->integer('first_installment')->nullable();
            $table->integer('last_installment')->nullable();
            $table->integer('first_payment_value')->nullable();
            // finance

            $table->enum('driving_license',['available','expired','doesnt_exist'])->nullable();  // both cash or finance
            $table->string('work')->nullable();  // both cash or finance
            // individual fields

            // required in case of ( individual finance & organization finance )
            $table->unsignedBigInteger('order_id')->nullable();
            $table->unsignedBigInteger('bank_id')->nullable();

            $table->foreign('order_id')->references('id')->on('orders')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('bank_id')->references('id')->on('banks')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('cars_orders');
    }
}
