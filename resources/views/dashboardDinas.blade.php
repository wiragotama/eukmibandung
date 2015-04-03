@extends('dashboardDinasLayout')

@section('content')
	<script>
  		var d=document.getElementById("dashboardLink");
  		d.className = d.className + " active";
	</script>

	<!-- start main -->
	<br> </br>
	<div class="container">
		<h2>DAFTAR UKMI UNTUK DIVERIFIKASI</h2>
		<div class="row footer">
			<div class="col-md-3 span1_of_4"> <p><a href="CRUDPage.html"><h5>NO REG : 0001AXB</h5></a></p>
										  <p><a href="CRUDPage.html"><h5>NO REG : 0002AXC</h5></a></p>
										  <p><a href="CRUDPage.html"><h5>NO REG : 0090ZZZ</h5></a></p>
			</div>
		</div>
	</div>

@stop