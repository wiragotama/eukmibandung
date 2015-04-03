@extends('guestlayout')
@section('content')
	<script>
  		var d=document.getElementById("loginLink");
  		d.className = d.className + " active";
	</script>
	
	<link href="css/loginStyle.css" rel='stylesheet' type='text/css' />
	<div class="container">
		<div class="login-form">
			<form id="loginForm" action="./login" method="POST">
				<li>
					<input id="username" name="username" type="text" class="text" value="USERNAME" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'USERNAME';}" >
				</li>
				<li>
					<input id="password" name="password" type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">
				</li>
				<div class="p-container">
						<input type="submit" onclick="#" value="SIGN IN" >
						<div class="clear"> </div>
				</div>
			</form>
		</div>
	</div>

@stop