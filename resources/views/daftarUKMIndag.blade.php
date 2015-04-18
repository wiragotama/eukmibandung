@extends('guestlayout')
@section('content')
	<script>
  		var d=document.getElementById("daftarUKMIndustriLink");
  		d.className = d.className + " active";
	</script>
	<!-- start main -->
	<br> </br>
	<div class="container">
		<div class="contact-form">
		  		<h2>Daftar UKM</h2>
			    <table class="table">
			        <thead>
			          	<tr>
			            	<!-- <th>Id.</th> -->
			            	<th>Nama Perusahaan</th>
			            	<th>Deskripsi</th>
			            	<th>Kontak</th>
			            	 <th class="row text-center">More</th>
			          	</tr>
			        </thead>
			        <tbody>
			        	<?php
			        		$results = DB::select('select id_ukm,kontak, deskripsi, nama_perusahaan from ukm');  		
			        		foreach($results as $row)
			        		{
			        			echo('<tr>');
							    // echo ('<td>'.$row->id_ukm.'</td>');
							    echo ('<td>'.$row->nama_perusahaan.'</td>');
							    echo ('<td>'.substr($row->deskripsi, 0, 25).'...'.'</td>');
							    echo ('<td>'.$row->kontak.'</td>');
							    echo ('<td class="row text-center"> <a href="/daftarUKM?id='.$row->id_ukm.'"> <img src="/images/list.png" alt="U Mark" style="width:20px;height:20px"> </span> </td>');
							    echo('</tr>');
							}
			        	?>
			        </tbody>
		      	</table>

    	</div>
    	<div class="contact-form">
		  		<h2>Daftar Industri</h2>
			    <table class="table">
			        <thead>
			          	<tr>
			            	<!-- <th>Id.</th> -->
			            	<th>Nama Perusahaan</th>
			            	<th>Deskripsi</th>
			            	<th>Kontak</th>
			            	<!-- <th class="row text-center">Delete</th>-->
			          	</tr>
			        </thead>
			        <tbody>
			        	<?php
			        		$results = DB::select('select id_industri, kontak, deskripsi, nama_perusahaan from industri');  		
			        		foreach($results as $row)
			        		{
			        			echo('<tr>');
							    // echo ('<td>'.$row->id_industri.'</td>');
							    echo ('<td>'.$row->nama_perusahaan.'</td>');
							    echo ('<td>'.substr($row->deskripsi, 0, 25).'...'.'</td>');
							    echo ('<td>'.$row->kontak.'</td>');
							    echo ('<td class="row text-center"> <a href="/daftarIndustri?id='.$row->id_industri.'"> <img src="/images/list.png" alt="U Mark" style="width:20px;height:20px"> </span> </td>');
							    echo('</tr>');
							}
			        	?>
			        </tbody>
		      	</table>
		      	
    	</div>
	</div>
@stop