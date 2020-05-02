<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->date('birth_date');
            $table->string('gender');
            $table->string('state');
            $table->string('city');
            $table->string('education');
            $table->date('year_complete');
            $table->string('image');            
            $table->string('skill');
            $table->string('certificates');
            $table->string('profession');
            $table->string('company');
            $table->date('job_start');
            $table->string('business');
            $table->string('location');
            $table->string('email');
            $table->string('mobile');
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
        Schema::dropIfExists('customers');
    }
}
