<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePerijinan extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ppl_ukmin_perijinan', function(Blueprint $table)
		{
			$table->string('nik', 20)->unique();
			$table->string('no_registrasi', 20)->unique();
			$table->string('jenis', 20);
		});	
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ppl_ukmin_perijinan');
	}

}
