<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->increments('id');
			$table->string('title');
			$table->string('price');
			$table->string('image');
			$table->float('lat');
			$table->float('lng');
			$table->string('address');
			$table->text('details');
			$table->string('subcat_id');
			$table->string('user_id');
			$table->boolean('activation');
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
        Schema::drop('ads');
    }
}
