<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('gender')->nullable();            
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('education')->nullable();
            $table->string('year_complete')->nullable(); 
            $table->string('image')->nullable();
            $table->string('skill')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();            
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
