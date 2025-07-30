<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->date('dob')->nullable(); 
            $table->string('gender')->nullable(); 
            $table->string('location')->nullable(); 
            $table->string('facebook')->nullable(); 
            $table->string('instagram')->nullable(); 
            $table->string('linkedin')->nullable();
            $table->string('city')->nullable(); 
            $table->string('state')->nullable(); 
            $table->string('country')->nullable();
            $table->string('pin_code')->nullable(); 
            $table->string('education')->nullable(); 
            $table->string('languages')->nullable(); 
            $table->string('experience')->nullable(); 
            $table->string('expertise')->nullable(); 
            $table->string('about')->nullable(); 
            $table->string('price')->nullable(); 
            $table->string('service')->nullable();
            $table->string('rating')->nullable();
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
        Schema::dropIfExists('users_details');
    }
}
