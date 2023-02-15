<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->unsignedInteger('district_id')->primary();
            $table->string('district_name')->nullable();
            $table->string('district_code', 10)->nullable();
            $table->string('kml_name')->nullable();
            $table->string('keyword')->nullable();
            $table->string('description')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('police_stations_kml')->nullable();
            $table->integer('province_id');
            $table->integer('division_idFk');
            $table->tinyInteger('orderby');
            $table->integer('sma_district_id');
            $table->integer('town_na_id');
            $table->double('d_sms_percentage', 8, 2)->nullable();
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
        Schema::dropIfExists('districts');
    }
}
