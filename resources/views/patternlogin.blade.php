<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

	<link rel="stylesheet" href="{{ URL::asset('css/login.css') }}">
		
	<!-- All the files that are required -->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
</head>

<body>
	<!--Header-->
	<div class="container" style="max-width:100%">
		<div class="row">
			<div class="col-1 col-xl-1"></div>
			<div class="col-10 col-xl-10">
				<h1> NTMS </h1>
				<p class="head"> Network Troubleshooting Management System </p>
			</div>
			<div class="col-1 col-xl-1"></div>
		</div>
		<!--<ul class="bg-bubbles">
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
		 </ul>-->
	</div> <!--จบ Header-->

	
		{{ $slot }}

		
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src="{{ URL::asset('js/login.js') }}"></script>
  </body>
</html>