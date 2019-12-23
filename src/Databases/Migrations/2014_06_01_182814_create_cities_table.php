<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration
{

    public function up()
    {
        Schema::create('location_cities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('state_micro_region_id')->nullable();
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('state_id')
                ->references('id')
                ->on('location_states')
                ->onDelete('cascade');

            $table->foreign('state_micro_region_id')
                ->references('id')
                ->on('location_state_micro_regions')
                ->onDelete('cascade');
        });

        Schema::create('location_city_regions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('city_id');
            $table->string('name', 255);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('city_id')
                ->references('id')
                ->on('location_cities')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('location_city_regions');
        Schema::dropIfExists('location_cities');
    }
}
