
@extends('guestlayout')

@section('content')
	
	<script>
  		var d=document.getElementById("homepageLink");
  		d.className = d.className + " active";
	</script>

	<br> </br>
	<div class="container">
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			  <!-- Indicators -->
			  <ol class="carousel-indicators">
			    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			  </ol>
			 
			  <!-- Wrapper for slides -->
			  <div class="carousel-inner">
			    <div class="item active">
			      <img src="images/ukm.jpg" alt="...">
			      <div class="carousel-caption" style="color:#CCFFFF">
			          <b> <h1>e-UKMI-Bandung</h1> </b>
			      </div>
			    </div>
			  </div>
			</div> <!-- Carousel -->
	</div>
@stop