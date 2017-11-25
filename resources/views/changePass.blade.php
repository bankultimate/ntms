<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Change Password</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <!--<script src="{{ asset('js/app.js') }}"></script>-->
  <!--jquery-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
<div class="wrapper">
	<div class="panel panel-default">
		<div class="container condes" id="forgotPart">
		<h1 style="font-size:46px">Change Password</h1>
			<div class="panel-body">
				<form  id="change" method="post" action="btChangePass">
					<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"  placeholder="Email address" required>
						@if ($errors->has('email'))
							<span class="help-block">
								<strong>{{ $errors->first('email') }}</strong>
							</span>
						@endif
					<input id="password" type="password"  name="password" placeholder="New Password" required>
					<input id="password-confirm" type="password"  name="password_confirmation" placeholder="Confirm Password" required>
					<button class="btn btn-primary" id="send" type="button" onclick="btChangePass()" > Change Password</button>
						<!--<button type="submit" class="btn btn-primary">
							Reset Password
						</button>-->
					{{ csrf_field() }}
				</form>
			
			</div>
		</div>
	</div>
	
	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
	
	
	
	
	

</div>
<!--<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>-->
<script src="{{ asset('js/index.js') }}"></script>
<script>
	function btChangePass(){
		if ($('#password').val() != $('#password-confirm').val() || $('#password').val() == 0 || $('#password-confirm').val() == 0)
		{
			$('#password-confirm').addClass("important");
			$('#password').addClass("important");
			if ( $('#email').val() == 0 )
			{
				 $('#email').addClass("important");
			}
		} 
		else 
		{	
			document.getElementById("change").submit();
		}
	}
</script>
<style>
.important {
    border-color: red;
}
</style>
</body>
</html>
