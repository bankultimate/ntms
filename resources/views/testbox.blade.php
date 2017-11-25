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
	<div class="container">
		<div class="row row2"> 
			<div class="col-xl-2"> </div>
			<div class="col-xl-8">
				<div class="panel with-nav-tabs panel-default">
					<div class="panel-heading">
						<ul class="nav nav-tabs">
							<li class="active"><a class="tab" href="#tab1default" data-toggle="tab">Command</a></li>
							<li><a class="tab" href="#tab2default" data-toggle="tab">Command Set</a></li>
							<li><a class="tab" href="#tab3default" data-toggle="tab">Command Line</a></li>
						</ul>
					</div>
					<div class="panel-body">
						<div class="tab-content">
							<div class="tab-pane in active" id="tab1default">
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
									<div class="container box2" id="commandBox1"> <!-- กล่อง result แสดงผล-->
									Tab1111111111
									</div>						
								</div>
							</div>
										
							<div class="tab-pane fade" id="tab2default">
								<div class="container box1"> <!--กล่อง ยิงคำสั่ง-->
									<div class="row all">
										<div class="col-xl-6"> 
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
									
										<div class="col-xl-6">
											<h4> Result : </h4>
											<div class="row">
												<div class="col-xl-9" id="inputForCMD2">
													<!--ทำให้กล่องป้อนip ขึ้นโดยเชคจากคอมมานว่าต้องกรอกอะไรบ้าง -->
												</div>
												<div class="col-xl-3">
													<button  class="btn btn-primary" href="" role="button" id="runcmd">Run</button >
												</div>
											</div>
											<div class="container box2" id="commandBox2"> <!-- class="container box2" กล่อง result แสดงผล-->
												 This is result box This is result box This is result box This is result boxThis is result box This is result box This is result box This is result box This is result box This is result box This is result box This is result boxThis is result box This is result box This is result box This is result box This is result box This is result box This is result box This is result boxThis is result box This is result box This is result box This is result box This is result box This is result box This is result box This is result boxThis is result boxbox This is result box This is result box This is result box This is result box This is result box This is result boxThis is result bo
											</div>
										
										</div>
									</div>
								</div>
							</div> <!--จบ tab 2-->
					
							<div class="tab-pane fade" id="tab3default">
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
													<option>1</option> 
												</select>
											 </div>
										</div>
										<div class="col-xl-2">	
											<button  class="btn btn-primary" href="" role="button" id="runcmd" onclick="replace1()">Run</button>
										</div>
									</div>
									<div class="container box2" id="commandBox1"> <!-- กล่อง result แสดงผล-->
										TAB333333333333333333333333
									</div>						
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-2"> </div>
		</div>
	</div>  
	@endcomponent