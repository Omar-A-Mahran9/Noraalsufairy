<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('model_id')->nullable();
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('branch_id');
            $table->string('model_name')->nullable();
            $table->enum('maintenance_type', ['Periodic Maintenance', 'Guarantee', 'Plumbing And Painting', 'Other']);
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->longText('description');
            $table->enum('status', ['pending', 'confirmed', 'cancelled'])->default('pending');
            $table->year('model_year')->nullable();
            $table->date('date');
            $table->time('time');
            $table->timestamps();

            $table->foreign('city_id')
            ->references('id')
            ->on('cities')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('branch_id')
            ->references('id')
            ->on('branches')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('model_id')
            ->references('id')
            ->on('models')
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
        Schema::dropIfExists('appointments');
    }
}
