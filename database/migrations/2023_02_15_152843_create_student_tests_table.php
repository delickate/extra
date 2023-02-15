<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_tests', function (Blueprint $table) {
            $table->integer('test_id');
            $table->integer('course_id')->nullable();
            $table->string('question_text', 100)->nullable();
            $table->string('answer_1', 100)->nullable();
            $table->string('answer_2', 100)->nullable();
            $table->string('answer_3', 100)->nullable();
            $table->string('answer_4', 100)->nullable();
            $table->enum('correct', ['answer_1', 'answer_2', 'answer_3', 'answer_4'])->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_tests');
    }
}
