<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {
          $table->string('STUDENTCODE',10);
          $table->string('NATIONALID',13);
          $table->string('PREFIXNAME',20);
          $table->string('PREFIXNAMEENG',20);
          $table->string('STUDENTNAME', 100);
          $table->string('STUDENTNAMEENG', 100);
          $table->string('FACULTYNAME', 100);
          $table->string('FACULTYNAMEENG', 100);
          $table->string('PROGRAMNAME', 100);
          $table->string('PROGRAMNAMEENG', 100);
          $table->string('DEGREE', 100);
          $table->string('DEGREEENG', 100);
          $table->string('STUDENTSTATUS', 100);
          $table->string('STUDENTYEAR', 100);
          $table->float('GPA');
          $table->date('STARTDATE');
          $table->date('DATEOFGRADUATED');
          $table->date('DATEOFBIRTH');
          $table->primary('STUDENTCODE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('STUDENT');
    }
}
