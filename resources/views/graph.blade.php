
@extends('guestlayout')

@section('content')
	
	<script>
  		var d=document.getElementById("homepageLink");
  		d.className = d.className + " active";
	</script>

	<br> </br>
	<div class="container">
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				<div id="stocks-div">
				{{$pdf}}
					<img src={{{ asset('images/graph/1.jpg') }}}>
				</div>
			</div> <!-- Carousel -->
	</div>
@stop