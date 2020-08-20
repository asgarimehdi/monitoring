<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCdDiseasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cd_diseases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('full_name');
            $table->string('national_code')->unique();
            $table->tinyInteger('sex');
            $table->date('birth_at');
            $table->date('diagnosis_at');
            $table->tinyInteger('result_id');
            $table->tinyInteger('type_id');
            $table->tinyInteger('status_id');
            $table->integer('point_id');
            $table->unsignedInteger('user_id');
            $table->double('lat');
            $table->double('lng');
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
        Schema::dropIfExists('cd_diseases');
    }
}
