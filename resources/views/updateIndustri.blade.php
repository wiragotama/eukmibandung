@extends('updateUKMINLayout')

@section('content2')
	<script>
  		var d=document.getElementById("CRUDLink");
  		d.className = d.className + " active";
  		var d=document.getElementById("updateIndustriLink");
  		d.className = d.className + " active";
	</script>
	
	<!--get id UKM here-->

	<div class="container">
		<div class="col-md-8">
		  <div class="contact-form">
		  	<h2>Update Industri</h2>
			    <?php
			    	echo('<form id="loginForm" onsubmit="#" action="updateIndustri?id='.$_GET['id'].'" method="POST">');
			    ?>
			    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
			    		<?php
			    		$result = DB::select('select * from ppl_ukmin_industri where id_industri='.$_GET['id']);
			    		foreach ($result as $row) {
			    		  	# code... 
					    	echo('<div>');
						     	echo('<span>Nomor Registrasi</span>');
						    	echo('<span><input name="noreg" type="text" class="form-control" id="noreg" value='.$row->no_registrasi.'> </span>');
						    echo('</div>');
					    	echo('<div>');
						    	echo('<span>username</span>');
						    	echo('<span><input name="username" type="text" class="form-control" id="username" value='.$row->username.'></span>');
						    echo('</div>');
						    echo('<div>');
						    	echo('<span>password</span>');
						    	echo('<span><input name="password" type="password" class="form-control" id="password" value='.$row->password.'></span>');
						    echo('</div>');
						    echo('<div>');
						     	echo('<span>Nama Perusahaan</span>');
						    	echo('<span><input name="namaperusahaan" type="text" class="form-control" id="namaperusahaan" value='.'"'.$row->nama_perusahaan.'"'.'></span>');
						    echo('</div>');
						    echo('<div>');
						     	echo('<span>Produk</span>');
						    	echo('<span><input name="produk" type="text" class="form-control" id="produk" value='.'"'.$row->produk.'"'.'></span>');
						    echo('</div>');
						    echo('<div>');
						     	echo('<span>Pemilik</span>');
						    	echo('<span><input name="pemilik" type="text" class="form-control" id="pemilik" value='.'"'.$row->pemilik.'"'.'></span>');
						    echo('</div>');
						    echo('<div>');
						     	echo('<span>Kontak</span>');
						    	echo('<span><input name="kontak" type="text" class="form-control" id="kontak" value='.'"'.$row->kontak.'"'.'></span>');
						    echo('</div>');
						    echo('<div>');
						    	echo('<span>Alamat</span>');
						    	echo('<span><textarea name="alamat" id="alamat">'.$row->alamat.' </textarea></span>');
						    echo('</div>');
						    echo('<div>');
						    	echo('<span>Deskripsi Perusahaan</span>');
						    	echo('<span><textarea name="deskripsi" id="deskripsi">'.$row->deskripsi.' </textarea></span>');
						    echo('</div>');

						   echo('<div>');
						   		echo('<span><input type="submit" value="Update"></span>');
						   echo('</div>');
						}
			    echo('</form>');
			  ?>
		    </div>
		</div>
	</div>
@stop