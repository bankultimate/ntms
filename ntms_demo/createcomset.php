<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<!-- Font -->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="css/main.css">
	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>  <!--Header-->
	<div class="container-fluid">
		<div class="row">
			<div class="col-1 col-xl-1"> </div>
			<div class="col-10 col-xl-10">
					<span class="badge badge-secondary">NTMS</span>
					<h1> Network Troubleshooting Management System</h1>
			</div>
			<div class="col-1 col-xl-1"> </div>
		</div>
	</div> <!--จบ Header-->
	
	
	<!--ตารางหน้าเว็บทั้งหมด-->
	<div class="container">
	<div class="row row2">
		<div class="col-xl-2"> </div>
		<div class="col-xl-8">
			<div class="container box1">
			<div class="row">
				<div class="col-xl-12"> 
					<p> Create your Command Set </p>
					<div class="container">
						<div class="row"> </div>
						<form id="multi">
							<fieldset>
								<div class="row">
									<div class="col-xl-5">
										<select name="selectfrom" id="select-from" multiple="multiple" size="9" class="form-control">
										<option value="1">ping</option>
										<option value="2">telnet</option>
										<option value="2">tracert</option>
										<option value="2">show version</option>
										<option value="2">display version</option>
										</select>
										<a href="javascript:void(0);" id="btn-up-source" class="btn btn-success btn-sm">Up</a>
										<a href="javascript:void(0);" id="btn-down-source" class="btn btn-success btn-sm">Down</a>
									</div>

									<div class="col-xl-2">
										<a href="javascript:void(0);" id="btn-add" name="btn-add" class="btn btn-primary btn-block">
											Move <img class="si-glyph" src="svg/si-glyph-arrow-right.svg" />
										</a>
										<a href="javascript:void(0);" id="btn-remove" name="btn-remove" class="btn btn-primary btn-block">
											<img class="si-glyph" src="svg/si-glyph-arrow-left.svg" /> Move
										</a>
									</div>
									<div class="col-xl-5">
										<select name="selectto" id="select-to" multiple="multiple" size="9" class="form-control">
										
										</select>
										<a href="javascript:void(0);" id="btn-up" class="btn btn-success btn-sm">Up</a>
										<a href="javascript:void(0);" id="btn-down" class="btn btn-success btn-sm">Down</a>
									</div>
								</div>
							<br/><br/> <br/><br/>
							<a class="btn btn-primary2" href="{{ URL::action('CommandController@home') }}" role="button"> Back </a>
							<input class="" type="submit" value="Submit" />
							
							</fieldset>
						</form>
					</div>
				</div>
			</div>
			</div>
			<div class="col-xl-2"> </div>
		</div>
	</div>
</div>
	
	<script src="js/main.js"></script>
	
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>