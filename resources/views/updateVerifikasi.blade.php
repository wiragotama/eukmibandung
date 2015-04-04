@extends('updateUKMINLayout')

@section('content2')
	<script>
  		var d=document.getElementById("CRUDLink");
  		d.className = d.className + " active";
  		var d=document.getElementById("updateVerifikasiLink");
  		d.className = d.className + " active";
	</script>
	
	<!--get id Verifikasi here-->

	<div class="container">
		<div class="col-md-8">
		  <div class="contact-form">
		  	<h2>Update Verifikasi</h2>
			    <form id="loginForm" onsubmit="#" action="http://localhost:8000/createUKM" method="POST">
			    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
			    	<div>
				     	<span>Nomor Registrasi</span>
				    	<span><input name="noreg" type="text" class="form-control" id="noreg"></span>
				    </div>
			    	<div>
				    	<span>status</span>
				    	<span>
				    		<!--php code untuk selected-->
				    		<select name="status" id="status" class="form-control">
							  <option value="not_verified">not verified</option>
							  <option selected="selected" value="verified">verified</option>
							  <option value="suspend">suspend</option>
							</select>
				    	</span>
				    </div>
				   <div>
				   		<span><input type="submit" value="Update"></span>
				  </div>
			    </form>
		    </div>
		</div>
	</div>
@stop