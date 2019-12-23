<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{

    public function up()
    {
        Schema::create('location_streets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('location_addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('city_region_id')->nullable();
            $table->unsignedBigInteger('neighborhood_id')->nullable();
            $table->unsignedBigInteger('street_id')->nullable();
            $table->morphs('addressable');
            $table->string('number')->nullable();
            $table->json('complement')->nullable();
            $table->string('postal_code', 9)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('city_id')
                ->references('id')
                ->on('location_cities')
                ->onDelete('cascade');

            $table->foreign('city_region_id')
                ->references('id')
                ->on('location_city_regions')
                ->onDelete('cascade');

            $table->foreign('neighborhood_id')
                ->references('id')
                ->on('location_neighborhoods')
                ->onDelete('cascade');

            $table->foreign('street_id')
                ->references('id')
                ->on('location_streets')
                ->onDelete('cascade');
        });

    }

    public function down()
    {
        Schema::dropIfExists('location_addresses');
        Schema::dropIfExists('location_streets');
    }
}
