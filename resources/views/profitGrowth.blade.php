@extends('dashboardUKMINLayout')
@section('content')
	<script>
  		var d=document.getElementById("dashboardLink");
  		d.className = d.className + " active";
	</script>

	<div class="container">
		<div class="col-md-3" style="border-style:solid;float:left">
		  <div class="contact-form">
			<h3>Pilih Tahun</h3>
				<?php
					echo Form::open(array('url' => '/create_graph'));
						echo Form::selectRange('tahun', 2014, 2016);
						echo Form::submit('Generate Grafik');
					echo Form::close();
				?>
				
				<hr/>
				<h3> Input Profit Bulanan </h3>
				<?php
					echo Form::open(array('url' => '/profitGrowth'));
						echo Form::selectRange('tahun', date("Y"),date("Y"));
						echo Form::selectRange('bulan', date("m"),date("m"));
						echo Form::submit('Input Profit');
					echo Form::close();
				?>
				</div>
		</div>
		<div class="col-md-6" style="margin-left:15px;margin-top:15px;">
				<?php
					if(!empty(Session::get('nama'))){
				?>
						<img src="{{ asset('images/graph/'.Session::pull('nama'))}}">
				<?php
					}
				?>		</div>
	</div>
@stop