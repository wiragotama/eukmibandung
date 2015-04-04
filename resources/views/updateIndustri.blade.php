@extends('updateUKMINLayout')

@section('content2')
	<script>
  		var d=document.getElementById("CRUDLink");
  		d.className = d.className + " active";
  		var d=document.getElementById("updateIndustriLink");
  		d.className = d.className + " active";
	</script>
	
	<!--get id industri here-->

	<!-- start main -->
	<div class="container">
		<div class="col-md-8">
		  <div class="contact-form">
		  	<h2>Update Industri</h2>
			    <form id="loginForm" onsubmit="#" action="http://localhost:8000/createIndustri" method="POST">
			    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
			    	<div>
				     	<span>Nomor Registrasi</span>
				    	<span><input name="noreg" type="text" class="form-control" id="noreg"></span>
				    </div>
			    	<div>
				    	<span>username</span>
				    	<span><input name="username" type="text" class="form-control" id="username"></span>
				    </div>
				    <div>
				    	<span>password</span>
				    	<span><input name="password" type="password" class="form-control" id="password"></span>
				    </div>
				    <div>
				     	<span>Nama Perusahaan</span>
				    	<span><input name="namaperusahaan" type="text" class="form-control" id="namaperusahaan"></span>
				    </div>
				    <div>
				     	<span>Produk</span>
				    	<span><input name="produk" type="text" class="form-control" id="produk"></span>
				    </div>
				    <div>
				     	<span>Pemilik</span>
				    	<span><input name="pemilik" type="text" class="form-control" id="pemilik"></span>
				    </div>
				    <div>
				     	<span>Kontak</span>
				    	<span><input name="kontak" type="text" class="form-control" id="kontak"></span>
				    </div>
				    <div>
				    	<span>Alamat</span>
				    	<span><textarea name="alamat" id="alamat"> </textarea></span>
				    </div>
				    <div>
				    	<span>Deskripsi Perusahaan</span>
				    	<span><textarea name="deskripsi" id="deskripsi"> </textarea></span>
				    </div>

				   <div>
				   		<span><input type="submit" value="Update"></span>
				  </div>
			    </form>
		    </div>
		</div>
</div>
@stop