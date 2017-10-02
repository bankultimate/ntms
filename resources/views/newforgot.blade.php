<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>New Forgot Password</title>
  <link rel="stylesheet" href="css/style.css">
  
</head>

<body>
	
<div class="wrapper">
	<div class="container condes" id="forgotPart">
		<h1>Forgot password</h1>
		<form class="form">
			<p>When you fill in your registered email address, you will be sent instructions on how to reset your password.<br></br></p>
			<input type="text" class="form-control" id="fp_email" name="fp_email" placeholder="email address">
			<button type="submit" id="login-button">Submit</button>
			<div class="etc-login-form">
				<p>already have an account? <a href="{{ URL::action('CommandController@index') }}">Login here</a></p>
			</div>
		</form>
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

  <script  src="js/index.js"></script>

</body>
</html>