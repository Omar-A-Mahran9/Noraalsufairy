<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('address_ar');
            $table->string('address_en');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->string('whatsapp');
            $table->string('google_map_url');
            $table->text('time_of_work_ar');
            $table->text('time_of_work_en');
            $table->text('frame');
            $table->enum('status',['visible','invisible']);
            $table->enum('type',['show_room','maintenance_center','3s_center']);
            $table->timestamps();

            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')
                ->references('id')
                ->on('cities')
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
        Schema::dropIfExists('branches');
    }
}
