<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCdFinilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cd_finils', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('point_id');
            $table->unsignedInteger('user_id');
            $table->string('full_name');
            $table->tinyInteger('sex');
            $table->tinyInteger('type');
            $table->date('birth_at');
            $table->date('diagnosis_at');
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
        Schema::dropIfExists('cd_finils');
    }
}
