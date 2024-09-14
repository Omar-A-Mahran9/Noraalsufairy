\<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('sub_model_ar');
            $table->string('sub_model_en');
            $table->string('main_image');
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('model_id');
            $table->text('description_ar'); // description in the car details page ( summernote )
            $table->text('description_en'); // description in the car details page ( summernote )

            // price
            $table->integer('price');
            $table->integer('discount_price')->nullable();
            $table->boolean('have_discount');
            $table->enum('price_field_status', ['show', 'competitive_price','available_on_request','unavailable','other']);
            $table->string('price_field_value'); // based on price field status this field get filled


            // settings
            $table->boolean('status'); // publish or not


            // seo fields
            $table->text('meta_keywords_ar')->nullable();
            $table->text('meta_keywords_en')->nullable();
            $table->text('meta_desc_ar')->nullable();
            $table->text('meta_desc_en')->nullable();

            //car specs
            $table->integer('year');

            // engine
            $table->string('engine_type');
            $table->string('fuel_consumption');
            // engine

            // measurements
            $table->string('maximum_force');
            // measurements

            // transmission
            $table->string('Motion_vector');
            $table->string('traction_type');
            // transmission

            // skeleton
            $table->integer('seats_number');
            $table->string('car_style');
            // skeleton

            //  المقاعد
            $table->string('upholstered_seats')->nullable();

            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->foreign('model_id')->references('id')->on('models')->onDelete('cascade');

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
