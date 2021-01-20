<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnCdCoronaContact extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cd_corona_contacts', function (Blueprint $table) {
            $table->string('first_name')->nullable()->after('national_code');
            $table->string('last_name')->nullable()->after('first_name');
            $table->string('tel')->nullable()->after('last_name');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
