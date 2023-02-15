<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentAssessmentTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_assessment_test', function (Blueprint $table) {
            $table->integer('question_id', true);
            $table->text('question_text')->nullable();
            $table->string('answer_1', 100)->nullable();
            $table->string('answer_2', 100)->nullable();
            $table->string('answer_3', 100)->nullable();
            $table->string('answer_4', 100)->nullable();
            $table->enum('correct', ['answer_1', 'answer_2', 'answer_3', 'answer_4'])->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->enum('type_of_assessment', ['pre', 'post'])->nullable();
            $table->integer('course_idFK')->nullable();
            $table->integer('topic_idFK')->nullable();
            $table->integer('activity_idFK')->nullable();
            $table->float('weightage', 10, 0)->nullable();
            $table->string('levels', 10)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_assessment_test');
    }
}
