<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{

    public function up()
    {
        Schema::create('location_countries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('code_phone', 5)->nullable();
            $table->string('lang')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('location_country_regions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('country_id');
            $table->string('name', 255);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('country_id')
                ->references('id')
                ->on('location_countries')
                ->onDelete('cascade');
        });

    }

    public function down()
    {
        Schema::dropIfExists('location_country_regions');
        Schema::dropIfExists('location_countries');
    }
}
