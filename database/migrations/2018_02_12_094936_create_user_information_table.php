<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_information', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname', 100)->nullable();
            $table->string('lastname', 100)->nullable();
            $table->string('ISP', 100)->nullable();
            $table->string('region_name', 100)->nullable();
            $table->string('country', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('company_name', 100)->nullable();
            $table->string('motive', 1000)->nullable();
            $table->string('phone_no', 10)->nullable();
            $table->string('REFCODE', 12);
            $table->string('ip', 500);
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
        Schema::dropIfExists('user_information');
    }
}
