<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions_answers', function (Blueprint $table) {
            $table->integer('qna_id', true);
            $table->integer('qna_student_idfk')->nullable();
            $table->integer('qna_course_idfk')->nullable();
            $table->integer('qna_topic_idfk')->nullable();
            $table->integer('qna_activity_idfk')->nullable();
            $table->integer('qna_questions_idfk')->nullable();
            $table->tinyInteger('qna_is_answer_correct')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions_answers');
    }
}
