<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDinas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ppl_ukmin_dinas', function(Blueprint $table)
		{
			$table->string('username', 20)->unique();
			$table->string('password', 20)->unique();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ppl_ukmin_dinas');
	}

}
