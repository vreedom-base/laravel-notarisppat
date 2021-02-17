<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVillagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('villages', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('code');
            $table->string('name');
            $table->unsignedInteger('atrbpn_code');
            $table->string('atrbpn_hashed_code')->nullable();
            $table->string('postal_codes')->nullable();
            $table->unsignedInteger('district_code');
            $table->unsignedInteger('district_atrbpn_code');
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
        Schema::dropIfExists('villages');
    }
}
