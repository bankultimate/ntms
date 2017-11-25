<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
		
		<title>CMD</title>
		<style>
			pre {
				width:600px;
				height:200px;
				overflow: auto;
			}
		</style>
    </head>
    <body>
		<div class="container">
			<div class="row">
				<div class="col-xs-3">
					<div class="form-group">
						<label for="usr">User:</label>
						<input type="text" class="form-control" id="user">
					</div>
				</div>
				<div class="col-xs-2" style="padding-top:25px;">
					<button class="btn btn-primary" type="button" id="bGetUser">Get</button> 
					<button class="btn btn-danger" type="button" id="bClearUser">Clear</button> 
				</div>
				<div class="col-xs-3">
					<div class="form-group">
						<label for="usr">Command:</label>
						<input type="text" class="form-control" id="command">
					</div>
				</div>
				<div class="col-xs-2" style="padding-top:25px;">
					<button class="btn btn-success" type="button" id="bNewCommand">New !</button> 
				</div>
			</div>
			<div class="row">
				<div class="col-xs-5" id="boxUser"></div>
				<div class="col-xs-5" id="boxCommand"></div>
			</div>
			<div class="row">
				<div class="col-xs-3">
					<div class="form-group">
						<label for="usr">Method:</label>
						<input type="text" class="form-control" id="method">
					</div>
				</div>
				<div class="col-xs-3">
					<div class="form-group">
						<label for="usr">RefID:</label>
						<input type="text" class="form-control" id="refid">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-8">
					<div class="form-group">
						<label for="usr">Type:</label>
						<input type="text" class="form-control" id="message">
					</div>
				</div>
				<div class="col-xs-2" style="padding-top:25px;">
					<button class="btn" type="button" id="bSendMessage">Send</button>
					<button class="btn" type="button" id="bRefresh">Refresh</button>					
				</div>
			</div>
		</div>
		
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
		
					<ul class="nav nav-tabs" id="cmdNav">
						<li class="active"><a data-toggle="tab" href="#home">Home</a></li>
						<li><a data-toggle="tab" href="#menu1">Menu 1</a></li>
						<li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
					</ul>

					<div class="tab-content" id="cmdContent">
						<div id="home" class="tab-pane fade in active">
							<h3>HOME</h3>
							<p>Some content.</p>
							<pre></pre>
						</div>
						<div id="menu1" class="tab-pane fade">
							<h3>Menu 1</h3>
							<p>Some content in menu 1.</p>
							<pre></pre>
						</div>
						<div id="menu2" class="tab-pane fade">
							<h3>Menu 2</h3>
							<p>Some content in menu 2.</p>
							<pre></pre>
						</div>
					</div>
				
				</div>
			</div>
		</div>
		
		<script>
			var userCommand = {};
			var currentCmdID = -1;
			var currentTab = '';
			var cmdObj = {
				arr:[],
				length:0,
				init:function(allcmd,tabID){
					this.length = allcmd.length;
					for (i=0;i<this.length;i++){
						this.arr[i] = this.newArr();
						this.arr[i].cmdID = allcmd.myID[i];
						this.arr[i].command = allcmd.myCommand[i];
						this.arr[i].message.history = allcmd.myHistory[i];
						this.arr[i].message.current = allcmd.myHistory[i].length;
						this.arr[i].max = allcmd.max;
						getCommand(this.arr[i].cmdID,-1,tabID[i]);
					}
				},
				newArr:function(){
					return {cmdID:0,command:'',stdOut:[],lastIndex:0,max:100,end:true,indexTimeout:0,message:{history:[],current:-1}};
				},
				findI:function(cmdID){
					var x = -1;
					for (i=0;i<this.length;i++){
						if (this.arr[i].cmdID == cmdID){
							x = i;
							break;
						}
					}
					return x;
				},
				getLastIndex:function(cmdID){
					var i = this.findI(cmdID);
					return this.arr[i].lastIndex;
				},
				setLastIndex:function(cmdID,lastIndex){
					var i = this.findI(cmdID);
					this.arr[i].lastIndex = lastIndex;
					return this.arr[i].lastIndex;
				},
				setCountLIndex:function(cmdID,index){
					var i = this.findI(cmdID);
					if (index == this.arr[i].lastIndex){
						this.arr[i].indexTimeout++;
					} 
					return this.arr[i].indexTimeout < 30;
				},
				clearCountLIndex:function(cmdID){
					var i = this.findI(cmdID);
					this.arr[i].indexTimeout = 0;
				},
				end:function(cmdID,mode,val){
					var i = this.findI(cmdID);
					if (mode == 'set'){
						this.arr[i].end = val;
					} 
					return this.arr[i].end;
				},
				getCommand:function(cmdID){
					var i = this.findI(cmdID);
					this.arr[i].indexTimeout = 0;
					getCommand(cmdID,this.arr[i].lastIndex,this.tabID(cmdID));
					return this.arr[i].lastIndex;
				},
				updateStd:function(cmdID,start,end,stdout,tabID){
					var i = this.findI(cmdID);
					if (this.arr[i].lastIndex < end) {
						var lastIndex = this.setLastIndex(cmdID,end);
						var max = this.arr[i].max;
						
						var x = lastIndex - stdout.length;
						// IF  Arr.length < MAX
						/*if (stdout.length >= max) {
							x = lastIndex - max;
						}*/
						// State 
						var state = stdout.length <= max;
						if (state){
							for (j=0;j<stdout.length;j++){
								this.arr[i].stdOut[(x+j)%max] = stdout[j];
							}
							
							// Print to PRE
							var desPre = $('#'+tabID+' > pre');
							desPre.html('');
							x = lastIndex;
							var y = lastIndex + max;
							if (this.arr[i].stdOut.length < max){
								x = 0;
								y = this.arr[i].stdOut.length;
							}
							console.log(x+','+y);
							for (j=x;j<y;j++){
								desPre.append(this.arr[i].stdOut[j%max]);
							}
						}
					}
				},
				tabID:function(cmdID){
					var i = this.findI(cmdID);
					return 'cmd'+cmdID+this.arr[i].command;
				},
				upMessage:function(cmdID){
					var i = this.findI(cmdID);
					var message = '';
					if (i != -1) {
						if (this.arr[i].message.current != -1){
							if (this.arr[i].message.current > 0) {
								this.arr[i].message.current -= 1;
							}
							message = this.arr[i].message.history[this.arr[i].message.current];
						}
					}
					return message;
				},
				downMessage:function(cmdID){
					var i = this.findI(cmdID);
					var message = '';
					if (i != -1) {
						if (this.arr[i].message.current != -1){
							if (this.arr[i].message.current < this.arr[i].message.history.length) {
								this.arr[i].message.current += 1;
							}
							if (this.arr[i].message.current != this.arr[i].message.history.length) {
								message = this.arr[i].message.history[this.arr[i].message.current];
							}
						}
					}
					return message;
				},
				enterMessage:function(cmdID,message){
					var i = this.findI(cmdID);
					this.arr[i].message.history.push(message);
					this.arr[i].message.current = this.arr[i].message.history.length;
					return this.arr[i].message.current;
				}
			};
			var default_nav = '<li class="active"><a data-toggle="tab" href="#home">Home</a></li>'+
				'<li><a data-toggle="tab" href="#menu1">Menu 1</a></li>'+
				'<li><a data-toggle="tab" href="#menu2">Menu 2</a></li>';
			var default_content = '<div id="home" class="tab-pane fade in active">'+
					'<h3>HOME</h3>'+
					'<p>Some content.</p>'+
				'</div>'+
				'<div id="menu1" class="tab-pane fade">'+
					'<h3>Menu 1</h3>'+
					'<p>Some content in menu 1.</p>'+
				'</div>'+
				'<div id="menu2" class="tab-pane fade">'+
					'<h3>Menu 2</h3>'+
					'<p>Some content in menu 2.</p>'+
				'</div>';
			var validate = {
				user:function(input){
					return input.search(/^[A-Za-z]{1}[^ ]+$/g) != -1;
				},
				command:function(input){
					return input.search(/^[A-Za-z]{1}[^ ]+$/g) != -1;
				}
			};
			$(document).ready(function(){
				//BUTTOM define
				$('#bGetUser').click(function(){getUserCommand(-1);});
				$('#bNewCommand').click(newCommand);
				$('#bClearUser').click(clearUserCommand);
				$('#bSendMessage').click(sendCommand);
				$('#bRefresh').click(function(){getCommand(-1);});
				//INPUT #user
				$('input#user').on({
					keydown:function(event){
						$(this).parent().removeClass("has-error");
						if(event.keyCode == 13) {
							getUserCommand(-1);
						}
					},
					blur:function(){
						$(this).parent().removeClass("has-error");
					}
				});
				//INPUT #command
				$('input#command').keydown(function(event){
					if(event.keyCode == 13) {
						newCommand();
					}
				});
				//INPUT #message
				$('input#message').keydown(function(event){
					if(event.keyCode == 13) {
						sendCommand();
					} else if (event.keyCode == 38) { //UP 38
						$(this).val(cmdObj.upMessage(currentCmdID));
					} else if (event.keyCode == 40) { //DOWN 40
						$(this).val(cmdObj.downMessage(currentCmdID));
					}
				});
				/*$(window).keydown(function(event){
					if(event.keyCode == 13) {
						event.preventDefault();
						return false;
					}
				  });*/
				
				//EVENT
			});
			function getUserCommand(activeTabID){
				var user = $('input#user').val(); //Temporary
				if (validate.user(user)) {
					var url = 'http://172.16.41.201/ntms/public/cmd/getallcmd/'+user;
					xRequest(url,function() {
						if (this.readyState == 4 && this.status == 200) {
							var json = JSON.parse(this.responseText);
							userCommand = json;
							if (json.length > 0) {
								tabRefresh(json,activeTabID);
							} else {
								showAlert('boxUser','Command session tab of this "'+json.user+'" user not found.');
							}
						}
					});
				} else {
					$('input#user').parent().addClass("has-error");
				}
			}
			function clearUserCommand(){
				var user = $('input#user').val(); //Temporary
				var url = 'http://172.16.41.201/ntms/public/cmd/clearallcmd/'+user;
				xRequest(url,function() {
					if (this.readyState == 4 && this.status == 200) {
						var json = JSON.parse(this.responseText);
						if (json.length === 0) {
							tabRefresh(json);
							alert('Clear all command tab complete!');
						} else {
							alert('Fail to clear all command tab!');
						}
					}
				});
			}
			function newCommand(){
				var user = $('input#user').val(); //Temporary
				var command = $('input#command').val();
				if (validate.user(user) && validate.command(command)) {
					var url = 'http://172.16.41.201/ntms/public/cmd/new/'+user+'.'+command;
					xRequest(url,function() {
						if (this.readyState == 4 && this.status == 200) {
							var json = JSON.parse(this.responseText);
							if (json.cmdID === -1) {
								showAlert('boxCommand','Command session is full.Cann'+"'"+'t new "'+json.command+'" command.');
							} else {
								getUserCommand('cmd'+json.cmdID+json.command);
							}
						}
					});
				}
			}
			function sendCommand(){
				var user = $('input#user').val(); //Temporary
				var method = $('input#method').val();
				var refid = $('input#refid').val();
				var cmdID = currentCmdID;
				var json = JSON.stringify({cmdID:cmdID,user:user});
				var url = 'http://172.16.41.201/ntms/public/cmd/cmdstate/'+json;
				xRequest(url,function() {
					if (this.readyState == 4 && this.status == 200) {
						var json = JSON.parse(this.responseText);
						if (json.state){
							var message = $('input#message').val();
							var obj = {};
							cmdObj.end(cmdID,'set',json.end);
							if (json.end) {
								//RUN
								var arr = message.split(" ");
								var command = arr.shift();
								obj = {command:command,args:arr,cmdID:cmdID,user:user,method:method,refid:refid};//user is temp when on product must delete
								url = 'http://172.16.41.201/ntms/public/cmd/run/'+JSON.stringify(obj);
							}else{
								//SET
								obj = {cmdID:cmdID,message:message,user:user};
								url = 'http://172.16.41.201/ntms/public/cmd/set/'+JSON.stringify(obj);
							}
							xRequest(url,function() {
								if (this.readyState == 4 && this.status == 200) {
									var json = JSON.parse(this.responseText);
									if (json.state){
										$('input#message').val('');
										cmdObj.enterMessage(currentCmdID,message);
										cmdObj.getCommand(cmdID);
									}
								}
							});
						} else {
							alert('TIMEOUT');
							getUserCommand(-1);
						}
					}
				});
			}
			function getCommand(cmdID,clientIndex,tabID){
				var json = JSON.stringify({cmdID:cmdID,clientIndex:clientIndex});
				var url = 'http://172.16.41.201/ntms/public/cmd/get/'+json;
				xRequest(url,function() {
					if (this.readyState == 4 && this.status == 200) {
						var json = JSON.parse(this.responseText);
						var desP = $('#'+tabID+' > p');
						var desPre = $('#'+tabID+' > pre');
						desP.html('index : '+json.index+'<br>');
						desP.append('end : '+json.end+'<br>');
						
						cmdObj.updateStd(cmdID,clientIndex,json.index,json.stdOut,tabID);
						// Scroll Bar
						desPre.scrollTop(document.getElementById(tabID+'Pre').scrollHeight);
						// If stdOut form server is blank []; Clear Refreash timeout
						if (json.stdOut.length != 0){
							cmdObj.clearCountLIndex(cmdID);
						}
						
						var index = cmdObj.getLastIndex(cmdID);
						cmdObj.end(cmdID,'set',json.end);
						if (!json.end && cmdObj.setCountLIndex(cmdID,index)){
							setTimeout(function(){
								getCommand(cmdID,index,tabID);
							},1000);
						}
						return index;
					}
				});
			}
			function xRequest(url,callback){
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = callback;
				xmlhttp.open("GET", url, true);
				xmlhttp.send();
			}
			function tabActiveState(obj){
				var sessionID = obj.attr('href');
				for (i=0;i<userCommand.length;i++) {
					var temp = '#cmd'+userCommand.myID[i]+userCommand.myCommand[i];
					if (temp == sessionID){
						currentCmdID = userCommand.myID[i];
						currentTab = 'cmd'+userCommand.myID[i]+userCommand.myCommand[i];
						setTimeout(function(){
							$('#'+currentTab+' > pre').scrollTop(document.getElementById(currentTab+'Pre').scrollHeight);
						},500);
						break;
					}
				}
			}
			function tabRefresh(json,activeTabID){
				$('#cmdNav').html('');
				$('#cmdContent').html('');
				var tabIDArr = [];
				for (i=0;i<json.length;i++) {
					var tabID = 'cmd'+json.myID[i]+json.myCommand[i];
					tabIDArr.push(tabID);
					/* Nav Refresh */
					$('#cmdNav').append('<li><a data-toggle="tab" href="#'+tabID+'" onclick="tabActiveState($(this))">'+json.myCommand[i]+'</a></li>');
					/* Content Refresh */
					var content = '<div id="'+tabID+'" class="tab-pane fade">'+
							'<h3>'+json.myCommand[i]+'</h3>'+
							'<p>Some content.</p>'+
							'<pre id="'+tabID+'Pre"></pre>'+
						'</div>';
					$('#cmdContent').append(content);
				}
				$('#cmdNav > li:first-child').addClass("active");
				//currentCmdID = json.myID[0];
				if (activeTabID != -1){
					$('#cmdNav > li > a[href='+"'#"+activeTabID+"'"+']').click();
				} 
				if (activeTabID == -1 || json.length == 1){
					currentCmdID = json.myID[0];
					currentTab = 'cmd'+json.myID[0]+json.myCommand[0];
					$('#cmdContent > div:first-child').addClass('active in');
				}
				cmdObj.init(json,tabIDArr);
			}
			function showAlert(ID,message){
				var tabID = 'alert'+(Math.floor(Math.random() * (999 - 100)) + 100);
				var content = '<div class="alert alert-danger alert-dismissable fade in">'+
					'<a href="#" class="close" data-dismiss="alert" aria-label="close" id="'+tabID+'">&times;</a>'+
					'<strong>Alert!</strong> '+message+
				'</div>';
				$('#'+ID).append(content);
				var hide = setTimeout(function(){hideAlert(tabID);}, 10000);
			}
			function hideAlert(ID){
				$('#'+ID).click();
			}
		</script>
    </body>
</html>
