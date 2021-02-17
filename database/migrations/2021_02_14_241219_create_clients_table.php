<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nik')->unique();
            $table->string('name');
            $table->unsignedTinyInteger('gender');
            $table->string('birth_place');
            $table->date('birth_date');
            $table->string('occupation')->nullable();
            $table->string('latest_education')->nullable();
            $table->string('religion');
            $table->unsignedTinyInteger('marital_status');
            $table->string('blood_type')->nullable();
            $table->string('postal_code')->nullable();
            $table->mediumText('address');
            $table->longText('extras')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
