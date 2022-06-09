<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistrictsTable extends Migration
{

    public function up()
    {
        Schema::create('location_districts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('city_id');
            $table->string('name');
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
        Schema::dropIfExists('location_districts');
    }
}
