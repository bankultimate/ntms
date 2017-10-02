<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Bootstrap CSS & JS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<!-- jQuery -->
		<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
		
		<title>CMD</title>

    </head>
    <body>
		<form id="cmdForm">
			Type your command : 
			<input type="text" name="cmd" value=""> 
			<button type="button" id="bSendCmd">Send !</button> 
			<button type="button" id="bClear">Clear !</button> 
			<button type="button" id="bTest">Test</button>
		</form>
		<div class="container-fluid">
			<div class="row">
				<div class="col-6">
					<p>Result</p>
				</div>
				<div class="col-6">
					<p>Checklist</p>
				</div>
			</div>
			<div class="row">
				<div id="result" class="col-6" style="border:1px solid black;width:600px;height:300px;">
					
				</div>
				<div id="checklist" class="col-6" style="border:1px solid green;width:600px;height:300px;">
					
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<form method="post" id="cmdForm2" action="http://172.16.41.201:8081/cmdPost">
						<input type="text" name="json" style="width:500px;">
						<input type="submit" value="Submit">
					</form>
				</div>
			</div>
		</div>
		
		<script>
			$(document).ready(function(){
				$('#bSendCmd').click(sendCommand);
				$('#bClear').click(function(){
					$('#result').html('');
				});
				$('#cmdForm').submit(function(e) {
					e.preventDefault();
					sendCommand();
				});
				$('#bTest').click(function(){
					alert($("iframe#iframe1").contents().find("#pCMD").text());
				});
				/*$(window).keydown(function(event){
					if(event.keyCode == 13) {
						event.preventDefault();
						return false;
					}
				  });*/
				  
				function sendCommand(){
					var myArr = $("input[name='cmd']").val().split(" ");
					var cmd = myArr[0];
					myArr.shift();
					var myObj = {"command":cmd,"args":myArr};
					var myJSON = JSON.stringify(myObj);
					$('#result').append('JSON : '+myJSON+'<br>'); 
					//var url = "http://172.16.41.201/ntms/public/cmd/"+myJSON;
					var url = "http://172.16.41.201:8081/cmd?json="+myJSON;
					
					$('#result').append("<iframe id='iframe1' src='"+ url +"' style='border:none;width:100%;height:100%;'></iframe>");
				}
				$('#iframe1').load(function(){
					alert('Hello');
				});
				function sendCommandTest(){
					var xmlhttp = new XMLHttpRequest();
					var myArr = $("input[name='cmd']").val().split(" ");
					var cmd = myArr[0];
					myArr.shift();
					var myObj = {"command":cmd,"args":myArr};
					var myJSON = JSON.stringify(myObj);
					$('#result').append('JSON : '+myJSON+'<br>'); 
					var url = "http://172.16.41.201/ntms/public/cmd/"+myJSON;
					
					xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							//var myArr = JSON.parse(this.responseText);
							$('#result').append(this.responseText);
							/*
							$('#result').append('Param : '+myArr.param+'<br>');
							$('#result').append('Format : '+myArr.format+'<br>');
							*/
						}
					};
					xmlhttp.open("GET", url, true);
					xmlhttp.send();
					$('#result').append('<hr>');
				}
			});
			function initIframe(me){
				alert(me[0].contentWindow.$("html").html());
			}
		</script>
    </body>
</html>
