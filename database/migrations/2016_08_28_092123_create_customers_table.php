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
            $table->increments('id');
			
			// Company Information | Company Profile
			$table->string('logo');
			$table->string('title');
			$table->text('address');
			$table->string('city');
			//$table->text('introduction');
			
			
			// Contat Information
			//$table->string('website');
			$table->string('email');
			$table->string('phone');
			//$table->string('telephone');
			//$table->string('fax');
			
			// Social Media
			$table->string('facebook');
			$table->string('instagram');
			$table->string('twitter');
			
			// Login Creadentials
			$table->string('username');
			$table->string('password');
			
			// Google Map Creadentials
			$table->string('map_address');
			$table->string('map_lat');
			$table->string('map_lng');
			
			// Verified
			$table->string('active');
			
			// TIMESTAMPS
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
        Schema::drop('customers');
    }
}
