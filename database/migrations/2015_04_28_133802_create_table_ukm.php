<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUkm extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ppl_ukmin_ukm', function(Blueprint $table)
		{
			$table->increments('id_ukm')->unique();
			$table->string('username', 20);
			$table->string('password', 20);
			$table->string('no_registrasi', 20)->unique();
			$table->string('nama_perusahaan');
			$table->longText('produk');
			$table->string('pemilik', 50);
			$table->string('alamat', 50);
			$table->longText('deskripsi');
			$table->string('kontak', 100);
			$table->float('rating');
			$table->integer('jumlah_pembeli_rating');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ppl_ukmin_ukm');
	}

}
