<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
			
			// Default Values in Users Table
            $table->increments('id');
            $table->string('name');
			//(Login Creadentials)
			$table->string('email')->unique();
            $table->string('password', 60);
			
			
			// Company Information | Company Profile
			$table->string('logo')->nullable();
			$table->text('address')->nullable();
			$table->string('city')->nullable();
			//$table->text('introduction');

			//Our salesman profile
			$table->string('designation')->nullable();
			
			
			// Contat Information
			$table->string('website')->nullable();
			$table->string('phone');
			$table->string('telephone')->nullable();
			$table->string('fax')->nullable();
			
			// Social Media
			$table->string('facebook')->nullable();
			$table->string('instagram')->nullable();
			$table->string('twitter')->nullable();
			
			// Google Map Creadentials
			$table->string('map_address')->nullable();
			$table->string('map_lat')->nullable();
			$table->string('map_lng')->nullable();
			
			// Verified
			$table->string('active');
			
			//Admin Type
			$table->string('admin_type');
			
			
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
