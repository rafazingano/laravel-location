<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatesTable extends Migration
{
    public function up()
    {
        Schema::create('location_states', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('country_region_id')->nullable();
            $table->string('code', 3);
            $table->string('name', 255);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('country_id')
                ->references('id')
                ->on('location_countries')
                ->onDelete('cascade');
            $table->foreign('country_region_id')
                ->references('id')
                ->on('location_country_regions')
                ->onDelete('cascade');
        });

        Schema::create('location_state_meso_regions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('state_id');
            $table->string('name', 255);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('state_id')
                ->references('id')
                ->on('location_states')
                ->onDelete('cascade');
        });

        Schema::create('location_state_micro_regions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('state_meso_region_id')->nullable();
            $table->string('name', 255);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('state_meso_region_id')
                ->references('id')
                ->on('location_state_meso_regions')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('location_state_micro_regions');
        Schema::dropIfExists('location_state_meso_regions');
        Schema::dropIfExists('location_states');
    }
}
