<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQueziesAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quezies_answers', function (Blueprint $table) {
            $table->id();
            $table->longText('name_ar')->nullable();
            $table->longText('name_en')->nullable();
            
            $table->longText('answer_text')->nullable();

            $table->boolean('correct_answer')->default(false);

            $table->unsignedBigInteger('quiz_id')->nullable();
            $table->foreign('quiz_id')
                ->references('id')
                ->on('quizzes')->onDelete('cascade');

            
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
        Schema::dropIfExists('_quezies_answers');
    }
}
