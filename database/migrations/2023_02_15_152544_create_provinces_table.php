<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvincesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provinces', function (Blueprint $table) {
            $table->unsignedBigInteger('province_id');
            $table->string('province_name');
            $table->string('lat')->nullable()->default('NULL');
            $table->string('lng')->nullable()->default('NULL');
            $table->string('province_color_code')->nullable()->default('NULL');
            $table->longText('province_points')->nullable();
            $table->double('sms_percentage', 8, 2)->default(0);
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
        Schema::dropIfExists('provinces');
    }
}
