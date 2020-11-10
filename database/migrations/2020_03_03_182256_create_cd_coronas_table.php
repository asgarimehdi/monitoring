<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCdCoronasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cd_coronas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('national_code')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('sex');
            $table->Integer('birth');
            $table->string('occupation');
            $table->tinyInteger('hospitalization');
            $table->tinyInteger('situation');
            $table->tinyInteger('diagnosis');
            $table->tinyInteger('status');
            $table->json('expose')->nullable();
            $table->unsignedBigInteger('point_id');
            $table->unsignedBigInteger('user_id');
            $table->double('lat');
            $table->double('lng');
            $table->date('diagnosis_at');
            $table->date('status_at')->nullable();
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
        Schema::dropIfExists('cd_coronas');
    }
}
