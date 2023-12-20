\<?php

use App\Enums\CarStatus;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
//check vendor and imageeeeeeeeee
            // basic info
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');
            $table->decimal('price',14);
            $table->decimal('discount_price',14);
            $table->boolean('have_discount')->default(0);
            $table->boolean('is_duplicate')->default(0);
            $table->string('video_url');
            // $table->foreignId('vendor_id')->references('id')->nullable()->on('vendors');
            $table->foreignId('city_id')->references('id')->on('cities');
            $table->foreignId('brand_id')->references('id')->on('brands');
            $table->foreignId('model_id')->references('id')->on('models');
            $table->foreignId('category_id')->references('id')->on('categories');
            $table->foreignId('color_id')->references('id')->on('colors');
            $table->unsignedBigInteger('kilometers')->nullable(); // for used cars only
            $table->integer('year');
            $table->enum('gear_shifter', ['manual', 'automatic']);
            $table->enum('supplier', ['gulf', 'saudi']); // gulf or saudi
            $table->boolean('is_new')->default(true); // new or used
            $table->text('description_ar');
            $table->text('description_en');
            $table->enum('fuel_type', ['gasoline', 'diesel', 'electric', 'hybrid'])->default('gasoline');           
             $table->string('status')->default(CarStatus::pending->value)->comment('App\Enums\CarStatus');
            $table->string('rejection_reason')->nullable();
            $table->boolean('publish')->default(1);
            $table->boolean('show_in_home_page')->default(1);
            $table->longText('main_image')->nullable();

            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
