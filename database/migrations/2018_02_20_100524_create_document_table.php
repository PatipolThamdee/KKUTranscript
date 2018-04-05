<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document', function (Blueprint $table) {
            // $table->increments('id');
            $table->string('REFCODE', 12);
            $table->string('STUDENTCODE', 10);
            $table->string('DOCUMENTCODE', 50);
            $table->string('DOCUMENTTYPE', 50);
            $table->string('CERTIFICATE', 100);
            $table->dateTime('ISSUEDATE');
            $table->string('SIGNBY', 100);
            $table->integer('reject')->default(0);
            $table->foreign('STUDENTCODE')->references('STUDENTCODE')->on('student');
            $table->primary('REFCODE');
            // $table->timestamps();
        });
      }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('document');
    }

}
