@component('patternmain')

	@slot('head')
	<title>Home</title>
	<link rel="stylesheet" href="css/main.css">
	
	<script>
		$(document).ready(function(){
			
		});	
	</script>
	@endslot
	<div class="container">
		<div class="row row2"> 
			<div class="col-xl-1 col-md-1"> </div>
			<div class="col-xl-10 col-md-10" style="padding:0">
				<div class="panel with-nav-tabs panel-default">
					<div class="panel-heading">
						<ul class="nav nav-tabs">
							<li class="active"><a id="commandNav" class="tab" href="#tab1default" data-toggle="tab" style="border-radius:8px 0 0 0;">Command</a></li>
							<li><a id="commandSetNav" class="tab" href="#tab2default" data-toggle="tab">Command Set</a></li>
							<li><a class="tab" href="#tab3default" data-toggle="tab" style="border-radius:0 8px 0 0;">Command Line</a></li>
						</ul>
					</div>
					<div class="panel-body">
						<div class="tab-content">
							<div class="tab-pane in active" id="tab1default">
								<div class="container box1">
									<div class="row">
										<div class="col-xl-3 col-md-3">	
											<div class="form-group">
												<select class="form-control command" id="exampleFormControlSelect1">
													{{-- @foreach ($num2 as $num) --}}
													<option>{{--{{ $num->name }}--}}</option>
													{{--@endforeach--}}
												</select>
											</div>
										</div>
										<div class="col-xl-7 col-md-7" id="inputForCMD">
											
										</div>
										<div class="col-xl-2 col-md-2">	
											<button class="btn btn-primary" href="" role="button" id="runcmd" onclick="replace1()" style="margin-right:1%;width:48%;">Run</button>
											<button class="btn btn-danger" href="" role="button" id="t1stopcmd" onclick="" style="width:48%;">Stop</button>
										</div>
									</div>	
									<div class="row">
										<div class="col-xl-3 col-md-3"></div>
										<div class="col-xl-9 col-md-9">
											<div class="panel panel-default">
												<div class="panel-body">A Basic Panel</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-xl-3 col-md-3">	
											<button class="btn btn-success" type="button" id="bNewTab" style="margin-right:10px;width:45%;">New Tab</button>
											<button class="btn btn-danger" type="button" id="bCommandTabClear" style="width:45%;">Clear</button>
										</div>
									</div>
									<!-- Tab in Tab กล่อง result แสดงผล-->
									<div class="panel-heading" style="margin-top:20px;">
										<ul class="nav nav-tabs" id="cmdNav">
											<!-- li -->
										</ul>
									</div>
									<div class="tab-content" id="cmdContent">
										<!-- div แสดงผล -->
									</div>
									<!-- end Tab in Tab กล่อง result แสดงผล-->
									<button id="btCopy" onclick="copyCmd()" class="btn btn-primary" > Copy </button>
									<div id="temp"></div>
								</div>
							</div>
							<div class="tab-pane fade" id="tab2default">
								<div class="container box1"> <!--กล่อง ยิงคำสั่ง-->
									<div class="row all">
										<div class="col-xl-5 col-md-5" style="padding:0 0 0 10px;"> 
											<div class="container">
												<div class="row" style="background-color: rgb(33, 33, 33); padding-top: 10px; padding-bottom: 10px;">
													<div class="col-xl-9 col-md-9"> 
														<h4><b> Use a Command Set </b></h4>
													</div>
													<div class="col-xl-3 col-md-3">
														<a class="btn btn-primary" href="{{ URL::action('CommandController@create') }}" role="button"> Create </a>
													</div>
												</div>
												<div class="row" style="padding-top: 20px; background-color: rgb(97, 97, 97);">  <!--แถวในกล่่อง-->
													<div class="col-xl-4 col-md-4" style="padding:0px;">
														<div class="list-group" id="buttonCmdSet" role="tablist">
															<!--รายชื่อ set1-10-->
														</div>
													</div>
													<div class="col-xl-8 col-md-8">
														<div class="tab-content" id="tableList">  
															<!--des set1-10 + รายการใน table-->
														</div>
													</div>
												</div>
												<div class="row" style="padding: 10px; background-color: rgb(97, 97, 97);">
													<div class="col-xl-7 col-md-7"></div>
													<div class="col-xl-5 col-md-5" style="text-align:right;">
														<a class="btn btn-primary" style="width:45%;" href="#" id="EditCmdSet" onclick="btEdit()" role="button" > Edit </a>
														<a class="btn btn-danger" style="width:45%;" href="#" id="btDelCmdSet" role="button" onclick="SureToDelete()"> Delete </a>
													</div>
												</div>
											</div>
										</div>
									
										<div class="col-xl-7 col-md-7" style="padding-top:10px;">
											<h4> Result : </h4>
											<div class="container">
												<div class="row" style="padding:0 0 10px 0;">
													<div class="col-xl-9 col-md-8" id="inputForCMD2">
														<!--ทำให้กล่องป้อนip ขึ้นโดยเชคจากคอมมานว่าต้องกรอกอะไรบ้าง -->
													</div>
													<div class="col-xl-3 col-md-4">
														<button style="width:48%;" class="btn btn-primary" href="" role="button" id="runCmdSet">Run</button >
														<button style="width:48%;" class="btn btn-danger" href="" role="button" id="breakCmdSet">Stop</button >
													</div>
												</div>
												<div id="cmdSetContent" class="row">
													<div class="col-xl-12 col-md-12">
														<pre class="commandSetPre"></pre>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div> <!--จบ tab 2-->
					
							<div class="tab-pane fade" id="tab3default">
								<div class="container box1">
									<div class="row">
										<div class="col-xl-10 col-md-10" id="" style="padding:5px 0 0 20px">
											Input your command : <input class="inbox" type="text" id="inputdata1" value="" style="width:60%;">
										</div>
										<div class="col-xl-2 col-md-2" style="padding:0">
											<button  class="btn btn-primary" href="" role="button" id="runCmdLine" onclick="replace2()" style="margin:5px 0 0 0;">Run</button>
											<button class="btn btn-primary" role="button" id="stopcmd" style="margin:5px 0 0 0;">Stop</button>
										</div>
									</div>
									<div class="row">
										<div class="col-xl-6 col-md-6">
											<div class="row" style="padding: 15px 0 0 0">
												<div class="col-xl-1 col-md-1">
													<button href="#" style="height:100%; padding:0 2px; border:0 5px 0 0;"> < </button>
												</div>
												<div class="col-xl-4 col-md-4">
													<div class="list-group" id="first" role="tablist" >
														<!--รายชื่อ set1-10-->
														<a class="list-group-item list-group-item-action active" data-toggle="list" role="tab" href="#second1" style="padding:5px 15px"> first1</a>
														<a class="list-group-item list-group-item-action" data-toggle="list" role="tab" href="#second2" style="padding:5px 15px"> first2 </a>
														<a class="list-group-item list-group-item-action" data-toggle="list" role="tab" href="#second3" style="padding:5px 15px"> first3 </a>
														<a class="list-group-item list-group-item-action" data-toggle="list" role="tab" href="#second4" style="padding:5px 15px"> first4 </a>
														<a class="list-group-item list-group-item-action" data-toggle="list" role="tab" href="#second5" style="padding:5px 15px"> first5 </a>
													</div>
												</div>
												<div class="col-xl-6 col-md-6">
													<div class="tab-content" id="second">  
														<!--des set1-10 + รายการใน table-->
														<div id="second1" class="tab-pane fade show active" role="tab">second1</div>
														<div id="second2" class="tab-pane fade show" role="tab">second2</div>
														<div id="second3" class="tab-pane fade show" role="tab">second3</div>
														<div id="second4" class="tab-pane fade show" role="tab">second4</div>
														<div id="second5" class="tab-pane fade show" role="tab">second5</div>
													</div>
												</div>
												<div class="col-xl-1 col-md-1">
													<button href="#" style="height:100%; padding:0 2px; border:0 5px 0 0;"> > </button>
												</div>
											</div>
										</div>
										<div class="col-xl-6 col-md-6" style="padding: 15px 0px 0px;">
											<div class="container box2" id="commandBox1"> <!-- กล่อง result แสดงผล-->
												TAB333333333333333333333333
											</div>
										</div>
									</div>											
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-1 col-md-1"></div>
		</div>
	</div>  
	
	@slot('script')
	<!--<script src="js/main.js"></script>-->
	<script>
		var cmdArr = [
		@foreach ($num2 as $num)
			{id:{{ $num->id }}, name:"{{ $num->name }}", param:"{{ $num->param }}",format:"{{ $num->format }}",method:"{{ $num->method }}",ref_id:"{{ $num->ref_id }}"},
		@endforeach
			{id:"9999", name:"Last", param:"",format:"",method:"",ref_id:""}
		];
		var cmdSetArr = [
		@foreach ($buttons as $button)
			{id:{{ $button->id }}, name:"{{ $button->set_name }}", description:"{{ $button->description }}"},
		@endforeach
			{id:"9999", name:"Last", description:""}
		];
		var tableArr = [
		@foreach ($contents as $content)
			{order:{{ $content->order }}, name:"{{ $content->name }}", cmdSetId:"{{ $content->cmdSetId }}",cmdId:"{{ $content->cmdId }}"},
		@endforeach
			{order:"9999", name:"Last", cmdSetId:"" , cmdId:""}
		];
		//var cmdSetState = 0;
		var user = '{{ Auth::user()->name }}';
		var userObj = {};
		var currentCmdID = -1;
		var currentTab = '';
		var tabExist = [false,false]; // [0] = Command State, [1] = CommandSet State
		var message = '';
		var messageCmd = '';
		var messageParam = '';
		var messageFormat = '';
		var messageMethod = '';
		var messageRef_id = '';
		/* Command Global Variable */
		var currentCommandCmdID = -1; // Last command Tab that select
		/* Command Set Global Variable */
		var cmdSetGlobal = {
			cmdSetCmdID:-1, // cmdID of commandSet of this user (cmdSetGlobal.cmdSetCmdID)
			currCmdSetID:-1, // Current cmdSetID that user select (cmdSetGlobal.currCmdSetID)
			currCmdSetASelect:-1, // Current Index of a menu that user select (cmdSetGlobal.currCmdSetASelect)
			cmdSetBreak:false // (cmdSetGlobal.cmdSetBreak)
		};
		var validate = {
			user:function(str){
				return str.search(/^[A-Za-z]{1}[^ ]+$/g) != -1;
			},
			command:function(str){
				return str.search(/^[A-Za-z]{1}[^ ]+$/g) != -1;
			}
		};
		
		var cmdObj = {
			arr:[],
			getMaxTimeout:30,
			initCmd:function(){
				return {cmdID:0,command:'',stdOut:[],lastIndex:0,max:100,end:true,indexTimeout:0,message:{history:[],current:-1,tabID:''}};
			},
			newCmd:function(command,cmdID){
				var i = this.arr.push(this.initCmd()) - 1;
				this.arr[i].command = command;	
				this.arr[i].cmdID = cmdID;
				return i;
			},
			nextCmd:function(mode){
				switch (mode){
					case 'index':
						return this.arr.length;
						break;
					case 'command':
						var tabNumber = 0;
						for (i=0;i<this.arr.length;i++) {
							if (this.arr[i].command.search(/^Tab[\d]+$/g) != -1) {
								tabNumber++;
							}
						}
						return 'Tab'+(tabNumber+1);
						break;
				}
			},
			findI:function(cmdID){
				var i = -1;
				for (i=0;i<this.arr.length;i++){
					if (this.arr[i].cmdID == cmdID){
						break;
					}
				}
				return i;
			},
			end:function(cmdID,val){
				var i = this.findI(cmdID);
				this.arr[i].end = val;
				return this.arr[i].end;
			},
			getCommand:function(cmdID){
				var i = this.findI(cmdID);
				this.arr[i].indexTimeout = 0;
				getCommand(cmdID,this.arr[i].lastIndex,this.tabID(cmdID));
				return this.arr[i].lastIndex;
			},
			getAllCommand:function(){
				for (i=0;i<this.arr.length;i++){
					this.getCommand(this.arr[i].cmdID);
				}
			},
			tabID:function(cmdID){
				var i = this.findI(cmdID);
				return 'cmd'+cmdID+this.arr[i].command;
			},
			updateStd:function(cmdID,start,end,stdout,tabID){
				var i = this.findI(cmdID);
				if (this.arr[i].lastIndex < end) {
					var lastIndex = this.setLastIndex(cmdID,end);
					var max = this.arr[i].max;
					
					var x = lastIndex - stdout.length;
					
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
						console.log('UPDATE cmdObj['+i+']('+this.arr[i].command+').updateStdOut['+x+'-'+y+']');
						for (j=x;j<y;j++){
							desPre.append(this.arr[i].stdOut[j%max]);
						}
					}
				}
			},
			setLastIndex:function(cmdID,lastIndex){
				var i = this.findI(cmdID);
				this.arr[i].lastIndex = lastIndex;
				return this.arr[i].lastIndex;
			},
			getLastIndex:function(cmdID){
				var i = this.findI(cmdID);
				return this.arr[i].lastIndex;
			},
			clearCountLIndex:function(cmdID){
				var i = this.findI(cmdID);
				this.arr[i].indexTimeout = 0;
			},
			setCountLIndex:function(cmdID,index){
				var i = this.findI(cmdID);
				if (index == this.arr[i].lastIndex){
					this.arr[i].indexTimeout++;
				} 
				return this.arr[i].indexTimeout < this.getMaxTimeout;
			},
			setTimeoutLIndex:function(cmdID){
				var i = this.findI(cmdID);
				this.arr[i].indexTimeout = this.getMaxTimeout;
			}
		};
		
		$(document).ready(function(){
			/* Global Initial Tab */
			// Get all command session of user when document ready
			console.log('[GLOBAL TAB INIT]');
			getUserCommand(-1);
			
			/* Initial Command Tab */
			// Print command list when page load
			commandOptionPrint();
			// Print input list of command when click command
			cmdSelect(1);
			
			/* Initial Command Set Tab */
			//set ปุ่ม 1-10
			buttonCmdSet();
			//desของแต่ละ set + table list ใน set
			tableList();
			// Auto Select first Command Set
			cmdSetGlobal.currCmdSetASelect = $('#buttonCmdSet > a:first-child').index();
			
			/* CLICK */
			// Option on command list event
			$("#exampleFormControlSelect1 > option").click(function(){
				cmdSelect($(this).attr("value"));
			});
			// New Tab Button event
			$('#bNewTab').click(function(){
				getUserCommand(function(){
					newCommand(-1);
				});
			});
			// Break Command
			$('#t1stopcmd').click(function(){breakCommand(currentCmdID);});
			$('#breakCmdSet').click(function(){breakCommand(currentCmdID);});
			$('#bCommandTabClear').click(function(){
				clearCommand();
			});
			$('#commandSetNav').click(function(){
				$('#buttonCmdSet > a:eq('+cmdSetGlobal.currCmdSetASelect+')').click();
				//currentCmdID = cmdSetGlobal.cmdSetCmdID;
			});
			$('#commandNav').click(function(){
				console.log('commandNav CLICK');
				currentCmdID = currentCommandCmdID;
				var i = cmdObj.findI(currentCommandCmdID);
				setTimeout(function(){
					//console.log('timeout');
					$('#a'+cmdObj.arr[i].tabID).click();
					//$('#a'+cmdObj.arr[i].tabID).parent().addClass('active');
					$('#'+cmdObj.arr[i].tabID).addClass('active in');
				},10);
				
			});	
			$('#buttonCmdSet > a').click(function(){
				cmdSetGlobal.currCmdSetASelect = $(this).index();
			});
			
			/* KEYDOWN */
			//INPUT #message keydown "Enter" (code = 13) event 
			$('input.runCommand').keydown(function(event){
				if(event.keyCode == 13) {
					//replace1();
				}
			});
		});
		
		function newCommand(command){
			if (command == -1) {
				command = cmdObj.nextCmd('command'); // Bug
			}
			if (validate.user(user) && validate.command(command)) {
				var url = 'http://172.16.41.201/ntms/public/cmd/new/'+user+'.'+command;
				xRequest(url,function() {
					if (this.readyState == 4 && this.status == 200) {
						var json = JSON.parse(this.responseText);
						if (json.cmdID === -1) {
							alert('Command session is full.Cann'+"'"+'t new "'+json.command+'" command.');
						} else {
							// Create new cmdObj at client 
							var index = cmdObj.newCmd(command,json.cmdID);
							// Check Command Tab or Command Set
							if ( cmdObj.arr[index].command.search(/^Tab[\d]+$/g) != -1 ) {
								currentCommandCmdID = json.cmdID;
								tabExist[0] = true;
							} else if (cmdObj.arr[index].command.search('commandSet') != -1) {
								cmdSetGlobal.cmdSetCmdID = json.cmdID;
								tabExist[1] = true;
							}
							
							// If have Command Tab1 and commandSet Already get all
							if (tabExist[0] && tabExist[1]){
								var tabID = 'cmd'+json.cmdID+json.command;
								if (cmdObj.arr[index].command == 'commandSet') {
									tabID = -1;
								}
								getUserCommand(tabID);
							}
						}
					}
				});
			}
		}
		
		function sendCommand(){
			var cmdID = currentCmdID;
			var json = JSON.stringify({cmdID:cmdID,user:user});
			var url = 'http://172.16.41.201/ntms/public/cmd/cmdstate/'+json;
			xRequest(url,function() {
				if (this.readyState == 4 && this.status == 200) {
					var json = JSON.parse(this.responseText);
					if (json.state){
						var obj = {};
						cmdObj.end(cmdID,json.end);
						if (json.end) {
							//RUN
							var arr = message.split(" ");
							var command = arr.shift();
							obj = {command:command,args:arr,cmdID:cmdID,user:user,method:messageMethod,refid:messageRef_id};//user is temp when on product must delete
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
									//cmdObj.enterMessage(currentCmdID,message);
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
		
		var tempT = {};
		function getUserCommand(){
			if (validate.user(user)) {
				console.log('[GETUSERCMD]'+user);
				var url = 'http://172.16.41.201/ntms/public/cmd/getallcmd/'+user;
				var haveArgs = arguments.length > 0;
				var arg0 = (function(haveArgs,args){
					if (haveArgs) {
						return args[0];
					}
				})(haveArgs,arguments);
				xRequest(url,function() {
					if (this.readyState == 4 && this.status == 200) {
						var json = JSON.parse(this.responseText);
						userObj = json;
						/* Clear cmdObj */
						cmdObj.arr = [];
						for (i=0;i<json.myCommand.length;i++){
							/* Init cmdObj */
							var j = cmdObj.newCmd(json.myCommand[i],json.myID[i]);
							cmdObj.arr[j].message.history = json.myHistory[i];
							cmdObj.arr[j].tabID = 'cmd'+json.myID[i]+json.myCommand[i];
							cmdObj.arr[j].max = json.max;
							/* Set Tab Exist State */
							if (cmdObj.arr[j].command.search(/^Tab[\d]+$/g) != -1) {
								currentCommandCmdID = json.myID[i];
								tabExist[0] = true;
							} else if (cmdObj.arr[j].command.search('commandSet') != -1) {
								cmdSetGlobal.cmdSetCmdID = json.myID[i];
								tabExist[1] = true;
							}
						}
						if (tabExist[0] && tabExist[1]) {
							console.log('[TABREFRESH]');
							if (haveArgs){
								tabCommandRefresh(json,arg0);
							}else{
								tabCommandRefresh(json);
							}
						} else if (!tabExist[0] && tabExist[1]) {
							console.log('[NEWTAB]');
							newCommand(-1);
						} else if (tabExist[0] && !tabExist[1]) {
							console.log('[NEWCMDSET]');
							newCommand('commandSet');
						} else {
							console.log('[NEW-TAB&CMDSET]');
							newCommand(-1);
							newCommand('commandSet');
						}
					}
				});
			} else {
				$('input#user').parent().addClass("has-error");
			}
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
					// If stdOut form server is blank []; Clear Refreash timeout
					if (json.stdOut.length != 0){
						cmdObj.clearCountLIndex(cmdID);
						// Scroll Bar
						console.log('GETSTDOUT '+tabID);
						if (document.getElementById(tabID+'Pre').scrollHeight > $('#'+tabID+'Pre').height()){
							desPre.scrollTop(document.getElementById(tabID+'Pre').scrollHeight);
						}
					}
					
					var index = cmdObj.getLastIndex(cmdID);
					cmdObj.end(cmdID,json.end);
					if (!json.end && cmdObj.setCountLIndex(cmdID,index)){
						setTimeout(function(){
							getCommand(cmdID,index,tabID);
						},1000);
					}
					return index;
				}
			});
		}
		
		function breakCommand(cmdID){
			cmdSetGlobal.cmdSetBreak = true;
			var json = JSON.stringify({cmdID:cmdID,user:user});
			var url = 'http://172.16.41.201/ntms/public/cmd/break/'+json;
			xRequest(url,function() {
				if (this.readyState == 4 && this.status == 200) {
					var json = JSON.parse(this.responseText);
					if (json.state){
						cmdObj.end(cmdID,true);
						cmdObj.setTimeoutLIndex(cmdID);
						alert('Break success!');
					}else{
						alert('Break un-success!');
					}
				}
			});
		}
		
		function clearCommand(){
			var url = 'http://172.16.41.201/ntms/public/cmd/clearallcmd/'+user;
			xRequest(url,function() {
				if (this.readyState == 4 && this.status == 200) {
					var json = JSON.parse(this.responseText);
					if (json.length == 0){
						alert('Clear tab success!');
						location.reload();
					}else{
						alert('Clear tab un-success!');
					}
				}
			});
		}
		
		function xRequest(url,callback){
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = callback;
			xmlhttp.open("GET", url, true);
			xmlhttp.send();
		}
			
		/* Command Set Tab Script */
		//set ปุ่ม 1-10
		function buttonCmdSet(){
			//x = x + cmdSetState;
			len = cmdSetArr.length;
			var out = ''; 
			for (i = 0; i < len-1; i++){
				if (i == 0){
					out += '<a class="list-group-item list-group-item-action active"';
				}else{
					out += '<a class="list-group-item list-group-item-action"';
				}
				out += ' onclick="connectbox(' + cmdSetArr[i]["id"]+ ",'" + cmdSetArr[i]["name"]+ "'" +')" data-toggle="list" href="#set' + 
				cmdSetArr[i]["id"] + '" role="tab" style="padding:6px 12px">' + cmdSetArr[i]["name"] + '</a>';
			}
			$("#buttonCmdSet").html(out);
			//cmdSetState=x;
		}
		
		//desของแต่ละ set + table list ใน set
		function tableList(){
			var des = '' ; 
			for (i = 0; i < cmdSetArr.length-1 ; i++){
				if (i == 0){
					des += '<div id="set' + cmdSetArr[0]["id"] + '" class="tab-pane fade show active" role="tabpanel">';
				}else{
					des += '<div id="set' + cmdSetArr[i]["id"] + '" class="tab-pane fade" role="tabpanel">';
				}
				des += '<p>' + cmdSetArr[i]["description"] +'</p>' + 
				'<table class="table"><thead><tr><th>#</th><th>Command list</th></tr></thead>';
				for (j = 0; j < tableArr.length-1 ; j++){
					if (cmdSetArr[i]["id"] == tableArr[j]["cmdSetId"]){
						des += '<tr><td>' + tableArr[j]["order"] + '</td><td>' + tableArr[j]["name"] + '</td></tr>';
					}	
				}
				des += '</table></div>';
				
			} $("#tableList").html(des);
		}
		
		//กดsetแล้วข้อมูลที่กรอกขึ้นตามcommandที่ต้องใช้
		function connectbox(id,name){
			var x = tableArr.length - 1;
			var result = '';
			var DupPaRam = [];
			var result = '<div class="container">';
			for (i = 0; i < x; i++){
				if (tableArr[i]["cmdSetId"] == id){
					var y = cmdArr.length - 1;
					for (j = 0; j < y; j++) {
						if (cmdArr[j]['id'] == tableArr[i]["cmdId"]){
							if( cmdArr[j]['param'] ){
								var param = cmdArr[j]['param'].split("|");
								var z = param.length ;
								for (k = 0; k < z; k++) {
									var za = DupPaRam.length;
									var state = true ;
									for (l = 0; l < za; l++){
										if( param[k] == DupPaRam[l] ){
											state = false;
										}
									}
									if( state ){
										DupPaRam.push( param[k] );
									}
								}
							}
						}
					}
				}
			}
			var za = DupPaRam.length;
			for (l = 0; l < za; l++){
				var subParam = DupPaRam[l].substring(1,DupPaRam[l].length -1);
				result += '<div class="row"><div class="col-xl-4 col-md-5" style="padding:0;">' + '<p>' + subParam+ ' :' + '</p></div><div class="col-xl-8 col-md-7" style="padding:0;">';
				subParam = subParam.replace(/ /gm,'');
				result += '<input class="inbox commandSetInput" type="text" style="width:100%;" id="' +'commandSet'+subParam + '" value="" onkeydown="enterToRunCmdSet(event)"></div></div>';
			}
			result += '</div>';
			$("#inputForCMD2").html(result);
			$("#btDelCmdSet").attr("onclick",'SureToDelete(' + id +',"' + name +'")');
			$("#EditCmdSet").attr("onclick",'btEdit(' + id + ')');
			$("#runCmdSet").attr("onclick",'runCommandSet('+id+')');
			cmdSetGlobal.currCmdSetID = id;
		}
		
		function enterToRunCmdSet(event){
			var key = event.keyCode;
			if (key == 13){
				runCommandSet(cmdSetGlobal.currCmdSetID);
			}
		}
		
		function runCommandSet(cmdSetID){
			// Find cmdSetObj
			cmdSetGlobal.cmdSetBreak = false;
			var cmdSetObj = {};
			for (i=0;i<cmdSetArr.length;i++){
				if(cmdSetArr[i].id==cmdSetID){
					cmdSetObj = cmdSetArr[i];
					break;
				}
			}
			// Find command in set to cmdInSet
			var cmdInSet = [];
			var cmdInSetLength = 0;
			for (i=0;i<tableArr.length;i++){
				if(cmdSetObj.id==tableArr[i].cmdSetId){
					cmdInSetLength = cmdInSet.push(tableArr[i]);
				}
			}
			// Prepair Send Message
			var messageArr = [];
			for(i=0;i<cmdInSetLength;i++){
				var l = cmdArr.length - 1;
				for (j = 0; j < l; j++){
					if (cmdArr[j]["id"] == cmdInSet[i].cmdId) {break;}
				}
				messageArr.push({name:'',param:'',format:'',method:'',ref_id:''});
				l = messageArr.length - 1;
				messageArr[l].name = cmdArr[j]['name'];
				messageArr[l].param = cmdArr[j]['param'];
				messageArr[l].format = cmdArr[j]['format'];
				messageArr[l].method = cmdArr[j]['method'];
				messageArr[l].ref_id = cmdArr[j]['ref_id'];
				
				//sendCommand();
			}
			for (i=0;i<messageArr.length;i++){
				var str = updateCurrentMessage(messageArr[i]);
				console.log('Prepair '+i+'."'+str+'"');
			}
			sendCommandSet(0,messageArr);
		}
		
		function sendCommandSet(i,messageArr){
			if (i<messageArr.length && !cmdSetGlobal.cmdSetBreak) {
				console.log('SEND['+i+'] '+messageArr[i].name);
				var cmdID = cmdSetGlobal.cmdSetCmdID;
				var json = JSON.stringify({cmdID:cmdID,user:user});
				var url = 'http://172.16.41.201/ntms/public/cmd/cmdstate/'+json;
				xRequest(url,function() {
					if (this.readyState == 4 && this.status == 200) {
						var json = JSON.parse(this.responseText);
						if (json.state){
							var msg = updateCurrentMessage(messageArr[i]);
							var obj = {};
							cmdObj.end(cmdID,json.end);
							if (json.end) {
								//RUN
								var arr = msg.split(" ");
								var command = arr.shift();
								obj = {command:command,args:arr,cmdID:cmdID,user:user,method:messageArr[i].method,refid:messageArr[i].ref_id};//user is temp when on product must delete
								url = 'http://172.16.41.201/ntms/public/cmd/run/'+JSON.stringify(obj);
							}else{
								//SET
								obj = {cmdID:cmdID,message:msg,user:user};
								url = 'http://172.16.41.201/ntms/public/cmd/set/'+JSON.stringify(obj);
							}
							xRequest(url,function() {
								if (this.readyState == 4 && this.status == 200) {
									var json = JSON.parse(this.responseText);
									if (json.state){
										//cmdObj.getCommand(cmdID);
										var getState = getCommandSet(i,messageArr,cmdID,cmdObj.getLastIndex(cmdID));
									}
								}
							});
						} else {
							alert('TIMEOUT');
						}
					}
				});
			}
		}
		
		function getCommandSet(i,messageArr,cmdID,clientIndex){
			var tabID = cmdObj.tabID(cmdID);
			var json = JSON.stringify({cmdID:cmdID,clientIndex:clientIndex});
			var url = 'http://172.16.41.201/ntms/public/cmd/get/'+json;
			xRequest(url,function() {
				if (this.readyState == 4 && this.status == 200) {
					var json = JSON.parse(this.responseText);
					var desPre = $('#'+tabID+' > pre');
					
					cmdObj.updateStd(cmdID,clientIndex,json.index,json.stdOut,tabID);
					
					if (json.stdOut.length != 0){
						cmdObj.clearCountLIndex(cmdID);
						console.log(tabID+'Pre');
						if (document.getElementById(tabID+'Pre').scrollHeight > $('#'+tabID+'Pre').height()){
							desPre.scrollTop(document.getElementById(tabID+'Pre').scrollHeight);
						}
					}
					
					var index = cmdObj.getLastIndex(cmdID);
					cmdObj.end(cmdID,json.end);
					var getState = false;
					
					// Check Method
					switch(messageArr[i].method){
						case 'command':
							getState = json.end;
							break;
						case 'remote':
							getState = stdOutPromptScan(json.stdOut);
							break;
					} 
					
					if (cmdObj.setCountLIndex(cmdID,index)){
						if (!getState){
							setTimeout(function(){
								getState = getCommandSet(i,messageArr,cmdID,index);
							},1000);
						} else {
							sendCommandSet(++i,messageArr);
						}
					}
					
					return getState;
				}
			});
		}
		
		function stdOutPromptScan(stdOut){
			//var regex = new RegExp();
			var getState = false;
			for (i=0;i<stdOut.length;i++){
				getState = stdOut[i].search(/(#|>) ?$/) != -1;
				console.log('PROMPT['+getState+']='+stdOut[i]+' '+typeof stdOut[i]);
				if (getState) {break;}
			}
			return getState;
		}
		
		function updateCurrentMessage(messageArr){
			var res = messageArr.format.replace("[CMD]", messageArr.name);
			if (messageArr.param != ''){
				var paramArr = messageArr.param.split("|");
				l = paramArr.length;
				for (k = 0; k < l; k++) {
					var subParam = ('commandSet'+paramArr[k].substring(1,paramArr[k].length -1)).replace(/ /gm,'');
					res = res.replace(paramArr[k], document.getElementById(subParam).value);
				}
			}
			return res;
		}
		
		/* Command Tab Script */
		// Print command list when page load
		function commandOptionPrint(){
			var i;
			var cmdOption="";
			for (i = 0; i < (cmdArr.length - 1); i++) {
				cmdOption += '<option ';
				if (i==0){
					cmdOption += 'selected="selected" value="' + cmdArr[i]["id"] + '">' + cmdArr[i]["name"] + "</option>";
				}else{
					cmdOption += 'value="' + cmdArr[i]["id"] + '">' + cmdArr[i]["name"] + "</option>";
				}
			} 
			$("#runcmd").attr("onclick", "replace1()");
			$("#exampleFormControlSelect1").html(cmdOption);
		}
		
		// Print input list of command when click command
		function cmdSelect(id){
			var l = cmdArr.length - 1;
			for (i = 0; i < l; i++){
				if (cmdArr[i]["id"] == id) {break;}
			}
			messageCmd = cmdArr[i]['name'];
			messageParam = cmdArr[i]['param'];
			messageFormat = cmdArr[i]['format'];
			messageMethod = cmdArr[i]['method'];
			messageRef_id = cmdArr[i]['ref_id'];
			var output = '';
			if (cmdArr[i]['param'].length != 0){
				output += '<div class="container" style="padding-top:5px;">';
				var param = cmdArr[i]['param'].split("|");
				var l = param.length;
				for (i = 0;i<l;i++) {
					var subParam = param[i].substring(1,param[i].length -1);
					output += '<div class="row"><div class="col-xl-1 col-md-1"></div>' +
						'<div class="col-xl-3 col-md-3">' + subParam + ' : </div>';
					subParam = subParam.replace(/ /gm,'');
					output += 
						'<div class="col-xl-8 col-md-8">'+
							'<input class="inbox runCommand" type="text" id="' + 'command'+subParam + '" value="" onkeydown="enterToRunCmd(event)">' +
						'</div>'+
					'</div>';
				}
				output += '</div>';
			}
			$("#inputForCMD").html(output);
		}
		
		//copy button
		function copyCmd(preID) {
			//window.prompt("Copy to clipboard: Ctrl+C, Enter", $('#'+preID).html());
			$('#temp').html('<input id="copy" type="text" value="">');
			$('#copy').val($('#'+preID).html());
			var copyText = document.getElementById("copy");
			copyText.select();
			document.execCommand("Copy");
			$('#temp').html('');
			/*var text = document.getElementById(preID).innerHTML;
			text.select();
			document.execCommand("Copy");*/
			
		}
		
		function enterToRunCmd(event){
			var key = event.keyCode;
			if (key == 13){
				replace1();
			}
		}
		
		// Refresh current tab of user that no timeout
		function tabCommandRefresh(json){
			$('#cmdNav').html('');
			$('#cmdContent').html('');
			for (i=0;i<json.length;i++) {
				var tabID = '';
				if ( json.myCommand[i].search(/^Tab[\d]+$/g) != -1 ) {
					tabID = 'cmd'+json.myID[i]+json.myCommand[i];
					/* Nav Refresh */
					var nav = '<li>'+
						'<a id="a'+tabID+'" class="tab bottom" href="#' + tabID + '" data-toggle="tab" onclick="tabCommandActiveState($(this))" style="border-radius: 6px 6px 0 0;">'+ json.myCommand[i] + '</a>'+
						'</li>';
					$('#cmdNav').append(nav);
					/* Content Refresh */
					var content = '<div class="tab-pane fade container box2" id="'+tabID+'">'+
						'<p>Some content.</p>'+
						'<pre id="'+tabID+'Pre" style="height:270px;"></pre>'+
					'</div>';
					$('#cmdContent').append(content);
				} else if ( json.myCommand[i].search("commandSet") != -1 ){
					tabID = 'cmd'+json.myID[i]+json.myCommand[i];
					$('#cmdSetContent > div:first-child').attr("id",tabID)
					$('#cmdSetContent > div > pre').attr("id",tabID+'Pre')
				}
			}
			//$('#cmdNav > li:first-child').addClass("active");
			cmdObj.getAllCommand();
			if (arguments.length > 1){
				if (typeof arguments[1] == 'number' || typeof arguments[1] == 'string') {
					var activeTabID = arguments[1];
					// IF activeTabID == -1 set Tab1 Active
					if (activeTabID == -1){
						for (i=0;i<cmdObj.arr.length;i++){
							if (cmdObj.arr[i].command == 'Tab1'){
								$('#cmdNav > li > a[href='+"'#"+cmdObj.arr[i].tabID+"'"+']').click();
								$('#'+cmdObj.arr[i].tabID).addClass('active in');
								break;
							}
						}
					}else{
						$('#cmdNav > li > a[href='+"'#"+activeTabID+"'"+']').click();
						$('#'+activeTabID).addClass('active in');
					} 
				} else if (typeof arguments[1] == 'function'){
					var callback = arguments[1];
					callback();
				}
			}
		}
		
		function tabCommandActiveState(obj){
			var sessionID = obj.attr('href');
			for (i=0;i<userObj.length;i++) {
				var temp = '#cmd'+userObj.myID[i]+userObj.myCommand[i];
				if (temp == sessionID){
					currentCmdID = userObj.myID[i];
					currentCommandCmdID = currentCmdID;
					currentTab = 'cmd'+userObj.myID[i]+userObj.myCommand[i];
					$('#btCopy').attr('onclick',"copyCmd('"+currentTab+"Pre')");
					setTimeout(function(){
						$('#'+currentTab+' > pre').scrollTop(document.getElementById(currentTab+'Pre').scrollHeight);
					},500);
					break;
				}
			}
		}
		
		//replace แสดงข้อความที่พร้อมยิงในกล่องresult บน
		function replace1() { //cmd:ping,param:[IP Address]|[DES],format:  [IP Address] [DES]
			var res = messageFormat.replace("[CMD]", messageCmd);
			if (messageParam != ''){
				var paramArr = messageParam.split("|");
				l = paramArr.length;
				for (i = 0; i < l; i++) {
					var subParam = 'command'+paramArr[i].substring(1,paramArr[i].length -1).replace(/ /gm,'');
					res = res.replace(paramArr[i], document.getElementById(subParam).value);
				}
			}
			message = res;
			sendCommand();
		}
		
		
		//alert ต้องการลบไหม
		function SureToDelete(id,name){ 
			if (confirm('Are you sure to delete this "' + name +  '" command set?') == true) {
				window.location = 'http://172.16.41.201/ntms/public/btDelCmdSet/' + id;
			} 
		}
		
		// ปุ่มedit comset
		function btEdit(id){
			window.location = 'http://172.16.41.201/ntms/public/editcmdset/' + id;
		}
	</script>
	@endslot
@endcomponent