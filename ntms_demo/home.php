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
		<!--แถว1 กล่องใหญ่กรอกip และแสดงผล-->
		<div class="row row2"> 
			<div class="col-xl-1"> </div>
			<div class="col-xl-5">
				<div class="container box1">
					<div class="row">
						<div class="col-xl-8">
							Input ip address :
							<input class="inbox" type="text">
						</div>
						<div class="col-xl-4 x1">	
							<div class="form-group">
								<select class="form-control command" id="exampleFormControlSelect1">
								  <option>ping</option>
								  <option>tracert</option>
								  <option>show version</option>
								  <option>4</option>
								  <option>5</option>
								</select>
							 </div>
						</div>
					</div>
					<div class="container box2"> <!--กล่อง result แสดงผล-->
					  On one fine summer's day in a field a Grasshopper was hopping about in a musical mood. An ant passed by bearing along with great toil an ear of corn he was taking to the nest.
					  The grasshopper invited the ant to sit for a chat with him. But the ant refused saying that "I’m storing up food for winter". " Why don’t you do the same?" asked the ant to the grasshopper.
					  "Pooh! Why bother about winter?" said the Grasshopper; we have got enough food at present." But the Ant went on its way and continued its toil.
					  Finally, when winter came, the Grasshopper found itself dying of hunger, while it saw the ants distributing corn and grain from their storage.
					  Then the Grasshopper understood that…
					  It is best to prepare for the days of necessity. 
					</div>						
				</div>
			</div>
			<!--แถว2 ครึ่งหลังกล่อง troubleshoot -->
			<!--<div class="col-xl-1"> </div>-->
			<div class="col-xl-5"> 
				<div class="container box1"> <!--กล่อง ยิงคำสั่ง-->
				<div class="row">
					<div class="col-xl-9"> 
						<h4> Use a Command Set </h4>
					</div>
					<div class="col-xl-3"> 
						<input class="create" type="submit" value=" Create New" />
					</div>
					<table class="table">
					  <thead>
						<tr>
						  <th>#</th>
						  <th>Description</th>
						  <th>Command list</th>
						  <th> </th>
						</tr>
					  </thead>
					  <tbody>
						<tr>
						  <th scope="row">1</th>
						  <td>basic</td>
						  <td>ping <br\></br> telnet<br\></br> show version
						  </td>
						  <td> <input class="" type="submit" value="Select" /> </td>
						</tr>
						<tr>
						  <th scope="row">2</th>
						  <td>advance</td>
						  <td>tracert <br\></br> blah <br\></br> blah <br\></br> blah
						  </td>
						  <td> <input class="" type="submit" value="Select" /> </td>
						</tr>
					  </tbody>
					</table> 
				</div>
			</div>
			<div class="col-xl-1"> </div>
		</div> <!--จบแถว2-->
	</div> <!--จบตารางทั้งหน้าเว็บ-->
	
	
	<script src="js/main.js"></script>
	
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>