@extends('dashboardUKMINLayout')
@section('content')
	<script>
  		var d=document.getElementById("dashboardLink");
  		d.className = d.className + " active";
	</script>

	<div class="container">
		<div class="col-md-8">
		  <div class="contact-form">
			<h3>Pilih Tahun</h3>
				<?php
					echo Form::open(array('url' => '/profitGrowth'));
						echo Form::selectRange('tahun', 2014, 2016);
						echo Form::submit('Generate Grafik');
					echo Form::close();
				?>
				
				<hr/>
				<center>
					<img src="{{ asset('images/graph/'.Session::get('nama'))}}">
				</center>
		    </div>
		</div>
	</div>
@stop