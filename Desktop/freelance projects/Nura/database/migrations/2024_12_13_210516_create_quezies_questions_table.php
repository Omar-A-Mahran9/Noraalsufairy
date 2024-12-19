<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQueziesQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quezies_questions', function (Blueprint $table) {
            $table->id();
            $table->longText('name_ar');
            $table->longText('name_en');
            $table->enum('type', ['text','single', 'multiple', 'true_false'])->default('single');

            
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
        Schema::dropIfExists('_quezies_questions');
    }
}
