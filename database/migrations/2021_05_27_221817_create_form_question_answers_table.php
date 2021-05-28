<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormQuestionAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_question_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('form_questions_id')->index();
            $table->string('value');
            $table->timestamps();

            $table->foreign(['form_questions_id'])
                ->references('id')
                ->on('form_questions')
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
        Schema::dropIfExists('form_question_answers');
    }
}
