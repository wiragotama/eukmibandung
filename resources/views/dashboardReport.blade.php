@extends('dashboardDinasLayout')

@section('content')
	<script>
  		var d=document.getElementById("ReportLink");
  		d.className = d.className + " active";
	</script>

	<!-- start main -->
	<br> </br>
	<div class="container">
		<div class="col-md-6" style="float:left">
		  <div class="contact-form">
			<h3>Dashboard Perkembangan UKM Indag</h3>
				<?php
					echo Form::open(array('url' => '/create_graph'));
						echo "Pilih UKM Indag ". 
						echo Form::selectRange('tahun', 2014, 2016);
						echo Form::submit('Generate Grafik');
					echo Form::close();
				?>
				<hr/>
		</div>
	</div>
		<div class="col-md-6" style="margin-left:15px;margin-top:15px;">
			<?php
				if(Session::get('nama')){
			?>
					<img src="{{ asset('images/graph/'.Session::pull('nama'))}}">
			<?php
				}
			?>		
		</div>
	</div>

@stop