<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>New NTMS Login</title>
  <link rel="stylesheet" href="css/style.css">
  
</head>

<body>
	
<div class="wrapper">
	<div class="container" id="loginPart">
		<h1>Welcome to NTMS <br> <p>( Network Troubleshooting Management System )</br></p></h1>
		<div class="panel-body">
			<form class="form-horizontal form" method="POST" action="{{ route('login') }}">
				{{ csrf_field() }}

				<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
					

					
						<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Username" required autofocus >

						@if ($errors->has('email'))
							<span class="help-block">
								<strong>{{ $errors->first('email') }}</strong>
							</span>
						@endif
					
				</div>

				<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
					

					
						<input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

						@if ($errors->has('password'))
							<span class="help-block">
								<strong>{{ $errors->first('password') }}</strong>
							</span>
						@endif
					
				</div>

				<div class="form-group">
					
						<button type="submit" id="login-button" class="btn btn-primary">
							Login
						</button>
						<div class="etc-login-form">
							<p>forgot your password? <a class="btn btn-link" href="{{ route('password.request') }}">Click here</a></p>
						</div>
				</div>
			</form>
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
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="js/index.js"></script>
  
</body>
</html>
