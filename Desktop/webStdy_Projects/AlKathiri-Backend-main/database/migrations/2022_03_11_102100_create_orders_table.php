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
            $table->unsignedBigInteger('status_id')->default(1);
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->unsignedBigInteger('car_id')->nullable();
            $table->unsignedBigInteger('opened_by')->nullable();
            $table->unsignedBigInteger('color_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('funding_organization_id')->nullable();
            $table->unsignedBigInteger('funding_bank_id')->nullable();
            $table->string('city_name')->nullable();

            $table->enum('type',['individual','organization', 'unavailable_car']);
            $table->enum('payment_type',['cash','finance']);

            $table->string('id_and_driving_license')->nullable();
            $table->string('salary_identification')->nullable();
            $table->string('insurance_print')->nullable();
            $table->string('account_statement')->nullable();
            $table->enum('sector',['governmental','private']);


            // organization fields

            // cash or finance
            $table->text('cars')->nullable(); // json array [ [ car_id , car_name , count ] , [ car_id , car_name , count ] ]
            $table->string('name')->nullable();
            $table->string('phone');
            $table->string('age')->nullable();
            $table->string('car_name')->nullable();
            $table->string('organization_name')->nullable();
            $table->string('organization_email')->nullable();
            $table->string('organization_activity')->nullable();
            $table->string('organization_ceo')->nullable();
            $table->string('organization_age')->nullable();
            $table->string('organization_location')->nullable();
            // organization fields

            // individual fields

                // finance
            $table->string('work')->nullable();  // both cash or finance
            $table->double('price')->nullable();
            $table->double('salary')->nullable();
            $table->double('commitments')->nullable();
            $table->boolean('having_loan')->nullable();
            $table->boolean('having_personal_loan')->nullable();
            $table->integer('finance_duration')->nullable();
                // finance
            $table->dateTime('opened_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
            // individual fields

            // required in case of ( individual finance & organization finance )

            $table->foreign('car_id')
            ->references('id')
            ->on('cars')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('bank_id')
            ->references('id')
            ->on('banks')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('opened_by')
            ->references('id')
            ->on('employees')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('status_id')
            ->references('id')
            ->on('statuses')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('color_id')
            ->references('id')
            ->on('colors')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('city_id')
            ->references('id')
            ->on('cities')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('funding_organization_id')
            ->references('id')
            ->on('funding_organizations')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('funding_bank_id')
            ->references('id')
            ->on('banks')
            ->onUpdate('cascade')
            ->onDelete('cascade');
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
