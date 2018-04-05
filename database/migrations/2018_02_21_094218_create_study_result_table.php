<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudyResultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('study_result', function (Blueprint $table) {
            $table->increments('id');
            $table->string('STUDENTCODE', 10);
            $table->string('COURSENO', 6);
            $table->string('COURSENAME', 100);
            $table->string('COURSENAMEENG', 100);
            $table->string('GRADE', 2);
            $table->float('GRADENUM');
            $table->string('ACADEMICYEAR', 4);
            $table->string('TERM', 1);
            $table->integer('CREDITS');
            $table->foreign('STUDENTCODE')->references('STUDENTCODE')->on('student');
            $table->unique(['STUDENTCODE', 'COURSENO', 'ACADEMICYEAR', 'TERM']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('study_result');
    }
}
