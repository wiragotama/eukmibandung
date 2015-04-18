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
			<div class ="jumbotron">
				<div class="media">
					<div class="media-body">
					
						<?php
				        		$results = DB::select('select id_ukm,nama_perusahaan, pemilik,produk, alamat, kontak, deskripsi, rating, jumlah_pemberi_rating from ukm where id_ukm='.$_GET['id']);  		
				        		foreach($results as $row)
				        		{
								    // echo ('<td>'.$row->id_ukm.'</td>');
								    echo ('<h1 align="center" class="media-heading"><b>'.$row->nama_perusahaan.'</b></h1>');
								    echo ('<div><br></div>');
								    echo ('<h4><b>Deskripsi</b></h4><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span>');
								    echo ('<h5>'.$row->deskripsi.'</h5>');
								    echo ('<h4><b>Pemilik</b></h4><span class="glyphicon glyphicon-user" aria-hidden="true"></span>');
								    echo ('<h5>'.$row->pemilik.'</h5>');
								    echo ('<h4><b>Produk</b></h4><span class="glyphicon glyphicon-tag" aria-hidden="true"></span>');
								    echo ('<h5>'.$row->produk.'</h5>');
								    echo ('<h4><b>Kontak</b></h4><span class="glyphicon glyphicon-phone" aria-hidden="true"></span>');
								    echo ('<h5>'.$row->kontak.'</h5>');
								    echo ('<h4><b>Alamat</b></h4><span class="glyphicon glyphicon-home" aria-hidden="true"></span>');
								    echo ('<h5>'.$row->alamat.'</h5>');
								    echo ('<h4><b>Rating</b></h4>');
								    echo ('<div><h4><span class="glyphicon glyphicon-star" aria-hidden="true"></span>'.round($row->rating, 2).' dari '.$row->jumlah_pemberi_rating.' orang</h4></div>'); 
								   	?>
										<h4><b>Beri Rating</b></h4>
										<?php
											echo'<form id="loginForm" onsubmit="#" action="http://localhost:8000/ratingUKM?id='.$_GET["id"].'" method="POST">';
										?>
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<select name="rating" class="form-control">
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
											</select>
											<br>
											<input type="submit" class="btn btn-info" value="Submit"></button>
										</form>
							<?php
									
								}
				        	?>
					</div>
				</div>
			</div>
    	</div>
	</div>
@stop