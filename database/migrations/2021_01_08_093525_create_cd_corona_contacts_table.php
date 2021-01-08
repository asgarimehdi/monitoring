<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCdCoronaContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cd_corona_contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('corona_id');
            $table->string('national_code');

            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('cd_corona_contacts');
    }
}
