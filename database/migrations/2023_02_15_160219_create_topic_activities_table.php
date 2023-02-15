<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopicActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topic_activities', function (Blueprint $table) {
            $table->increments('activity_id');
            $table->string('activity_name', 50)->nullable();
            $table->integer('topic_idFK')->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->enum('activity_type', ['video', 'text', 'image'])->nullable();
            $table->text('activity_text')->nullable();
            $table->text('activity_link')->nullable();
            $table->enum('content_level', ['Easy', 'Medium', 'Hard']);
            $table->integer('content_level_value')->nullable();
            $table->enum('taxonomy_type', ['Bloom', 'Solo']);
            $table->enum('bloom_type', ['K', 'C', 'Higher Order']);
            $table->enum('solo_type', ['Pre-structure', 'Uni-structure', 'Multi-structure', 'Relational', 'Extended Abstruct']);
            $table->tinyInteger('score');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('topic_activities');
    }
}
