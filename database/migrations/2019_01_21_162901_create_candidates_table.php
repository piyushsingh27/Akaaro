<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->date('DOB');
            $table->string('gender');
            $table->string('current_location');
            $table->string('preferred_location');
            $table->string('school_10th');
            $table->string('marks_10th');
            $table->string('school_12th');
            $table->string('marks_12th');
            $table->string('university_UG');
            $table->string('college_UG');
            $table->string('aggregate_UG');
            $table->string('university_PG')->nullable();
            $table->string('college_PG')->nullable();
            $table->string('aggregate_PG')->nullable();
            $table->string('skills');
            $table->string('experience')->nullable();
            $table->string('salary')->nullable();
            $table->date('cv_last_modified')->nullable();
            $table->string('status')->nullable();
            $table->string('interview_type')->nullable();
            $table->string('submission_type')->nullable();
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
        Schema::dropIfExists('candidates');
    }
}
