@component('patternmain')

	@slot('head')
	<title>Home</title>
	<link rel="stylesheet" href="css/main.css">
	<script>
		$(document).ready(function(){
			$("#runcmd").click(function(){
				
			});
		});	
	</script>
	@endslot
	
	<!--ตารางหน้าเว็บทั้งหมด-->
	<div class="container">
		<!--แถว1 กล่องใหญ่กรอกip และแสดงผล-->
		<div class="row row2"> 
			<div class="col-xl-2"> </div>
			<div class="col-xl-8">
				<div class="container box1">
					<div class="row">
						<div class="col-xl-7" id="inputForCMD">
							<div class="container">
								<div class="row">
									<div class="col-xl-1"></div>
									<div class="col-xl-5">
										Input IP Address :
									</div>
									<div class="col-xl-5">
										<input class="inbox" type="text" id="inputdata1" value=" ">
									</div>
									<div class="col-xl-1"></div>
								</div>
								<div class="row">
									<div class="col-xl-1"></div>
									<div class="col-xl-5">
										Input Options :
									</div>
									<div class="col-xl-5">
										<input class="inbox" type="text" id="inputdata2" value=" ">
									</div>
									<div class="col-xl-1"></div>
								</div>
							</div>
						</div>
						<div class="col-xl-3">	
							<div class="form-group">
								<select class="form-control command" id="exampleFormControlSelect1" onchange="replace1()">
								{{-- @foreach ($num2 as $num) --}}
									<option>{{--{{ $num->name }}--}}</option>
								{{--@endforeach--}}
								</select>
							 </div>
						</div>
						<div class="col-xl-2">	
							<button  class="btn btn-primary" href="" role="button" id="runcmd" onclick="replace1()">Run</button>
						</div>
					</div>
					<div class="container box2" id="commandBox1"> <!-- class="container box2" กล่อง result แสดงผล-->
						
					</div>						
				</div>
			</div>
			<div class="col-xl-2"> </div>
		</div> <!--จบแถว2-->
			<!--แถว3 กล่อง troubleshoot -->
			<!--<div class="col-xl-1"> </div> -->
		<div class="row">  <!--เริ่มแถว3-->
			<div class="col-xl-1"> </div>
			<div class="col-xl-5"> 
				<div class="container box1"> <!--กล่อง ยิงคำสั่ง-->
					<div class="row">
						<div class="col-xl-9"> 
							<h4><b> Use a Command Set </b></h4>
						</div>
						<div class="col-xl-3">
							<a class="btn btn-primary" href="{{ URL::action('CommandController@create') }}" role="button"> Create New </a>
						</div>
					</div>
					<div class="row" style="margin-top:20px;">  <!--แถวในกล่่อง-->
						<div class="col-xl-4">
							<div class="list-group" id="buttonCmdSet" role="tablist">
								<!--รายชื่อ set1-10-->
							</div>
						</div>
						<div class="col-xl-8">
							<div class="tab-content" id="tableList">  
								<!--des set1-10 + รายการใน table-->
							</div>
						</div>
					</div>
					<a class="btn btn-primary" style="margin-top:10px;" href="#" id="EditCmdSet" onclick="btEdit()" role="button" > Edit </a>
					<a class="btn btn-primary" style="margin-top:10px;" href="#" id="btDelCmdSet" role="button" onclick="SureToDelete()"> Delete </a>
				</div>
			</div>
			<div class="col-xl-5">
				<div class="container box1"><h4> Result : </h4>
					<div class="row">
						<div class="col-xl-9" id="inputForCMD2">
							<!--ทำให้กล่องป้อนip ขึ้นโดยเชคจากคอมมานว่าต้องกรอกอะไรบ้าง -->
						</div>
						<div class="col-xl-3">
							<button  class="btn btn-primary" href="" role="button" id="runcmd">Run</button >
						</div>
					</div>
					<div class="container box2" id="commandBox2"> <!-- class="container box2" กล่อง result แสดงผล-->
						 This is result This is result box This is result box This is result box This is result box This is result box This is result box This is result boxThis is result box This is result box This is result box This is result box This is result box This is result box This is result box This is result boxThis is result box This is result box This is result box This is result box This is result box This is result box This is result box This is result boxThis is result box This is result box This is result box This is result box This is result box This is result box This is result box This is result boxThis is result box This is result box This is result box This is result box This is result box This is result box This is result box This is result boxThis is result boxbox This is result box This is result box This is result box This is result box This is result box This is result boxThis is result bo
					</div>
				</div>
			</div>
			<div class="col-xl-1"> </div>
		</div> <!--จบแถว3-->
	</div> <!--จบตารางทั้งหน้าเว็บ-->
	<!--<script src="js/main.js"></script>-->
	<script>
		var cmdArr = [
		@foreach ($num2 as $num)
			{id:{{ $num->id }}, name:"{{ $num->name }}", param:"{{ $num->param }}",format:"{{ $num->format }}"},
		@endforeach
			{id:"9999", name:"Last", param:"",format:""}
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
		
		$(document).ready(function(){
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
			$("#runcmd").attr("onclick", "replace1('" + cmdArr[0]['name'] + "','"+cmdArr[0]['param']+"','"+cmdArr[0]['format']+"')");
			$("#exampleFormControlSelect1").html(cmdOption);
			cmdSelect(1);
			$("#exampleFormControlSelect1 > option").click(function(){
				cmdSelect($(this).attr("value"));
			});
			buttonCmdSet();
			tableList();
			$('#btDelCmdSet').click(function() {
				 // Your code here
				 return false;
			});
		});
		
		//ปุ่ม set 1-10
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
				cmdSetArr[i]["id"] + '" role="tab">' + cmdSetArr[i]["name"] + '</a>';
			}
			$("#buttonCmdSet").html(out);
			//cmdSetState=x;
		}
		//desของแต่ละ set + table list ใน set
		function tableList(){
			var des = ''; 
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
			result += '<div class="row"><div class="col-xl-6">' + '<p>Input ' + subParam+ ' :' + '</p></div><div class="col-xl-6">' +
						'<input class="inbox" type="text" style="width: 100%;" id="' + subParam + ' value=" "></div>' +
						'</div>';
			}
			result += '</div>';
			$("#inputForCMD2").html(result);
			$("#btDelCmdSet").attr("onclick",'SureToDelete(' + id +',"' + name +'")');
			$("#EditCmdSet").attr("onclick",'btEdit(' + id + ')');
		}
				
		function cmdSelect(id){
			var debug = "";
			var l = cmdArr.length - 1;
			for (i = 0; i < l; i++){
				if (cmdArr[i]["id"] == id) {debug+="Break"; break;}
			}
			$("#runcmd").attr("onclick", "replace1('" + cmdArr[i]['name'] + "','"+cmdArr[i]['param']+"','"+cmdArr[i]['format']+"')");
			var output = '';
			if (cmdArr[i]['param'].length != 0){
				output = '<div class="container">';
				var param = cmdArr[i]['param'].split("|");
				var l = param.length;
				for (i = 0;i<l;i++) {
					var subParam = param[i].substring(1,param[i].length -1);
					output+='<div class="row">' +
							'<div class="col-xl-1"></div>' +
							'<div class="col-xl-5">' +
								'Input ' + subParam + ' :' +
							'</div>' +
							'<div class="col-xl-5"> ' +
								'<input class="inbox" type="text" id="' + subParam + '" value=" ">' +
							'</div>' +
							'<div class="col-xl-1"></div>' +
						'</div>';
				}
				output += '</div>';
			}
			$("#inputForCMD").html(output);
		}
		
		//replace แสดงข้อความที่พร้อมยิงในกล่องresult บน
		function replace1(cmd,param,format) { //cmd:ping,param:[IP Address]|[DES],format:  [IP Address] [DES]
			//var str = format;
			//var Select1 = document.getElementById("exampleFormControlSelect1");
			var res = format.replace("[CMD]", cmd);
			var paramArr = param.split("|");
			l = paramArr.length;
			for (i = 0; i < l; i++) {
				var subParam = paramArr[i].substring(1,paramArr[i].length -1);
				res = res.replace(paramArr[i], document.getElementById(subParam).value);
			}
			//var res = res.replace("[input1]", document.getElementById("inputdata1").value);
			document.getElementById("commandBox1").innerHTML = res;
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
@endcomponent