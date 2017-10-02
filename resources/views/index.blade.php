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
		
		<form class="form">
			<input type="text" placeholder="Username">
			<input type="password" placeholder="Password">
			<button type="submit" id="login-button">Login</button>
			<div class="etc-login-form">
				<p>forgot your password? <a href="{{ URL::action('CommandController@newforgot') }}">Click here</a></p>
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
