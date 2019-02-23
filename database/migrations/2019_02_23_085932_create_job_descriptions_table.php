<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_descriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('CompanyName');
            $table->string('jobtitle');
            $table->string('designation');
            $table->string('skills_required');
            $table->string('candidate_count');
            $table->string('salary');
            $table->string('experience');
            $table->string('location');
            $table->integer('admin_id')->default(1);
            $table->integer('client_id')->nullable();
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
        Schema::dropIfExists('job_descriptions');
    }
}
