@component('patternmain')

	@slot('head')
	<title>Create Command Set</title>
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
	<div class="row row2">
		<div class="col-xl-2 col-md-2"> </div>
		<div class="col-xl-8 col-md-8">
			<div class="container box1" style="border-radius:8px;">
			<div class="row">
				<div class="col-xl-12 col-md-12"> 
					<h4><b> Create your Command Set </b></h4>
					<div class="row">
						<div class="col-xl-7 col-md-7"> </div>
						<div class="col-xl-5 col-md-5"></div>
					</div>
					<div class="container">
						<div class="row"> 
							<div class="col-xl-12 col-md-12">
								<form method="post" id="myForm" action="btCreateCmdSet">
									<fieldset>
										<div class="row">
											<div class="col-xl-2 col-md-3">
											Name :
											</div>
											<div class="col-xl-10 col-md-9">
												<input class="inbox" type="text" name="NameCmdSet" value=" " style="width:350px">
											</div>
										</div>
										<div class="row">
											<div class="col-xl-2 col-md-3">
											Description :
											</div>
											<div class="col-xl-10 col-md-9">
												<textarea class="inbox" type="text" name="DesCmdSet" value=" " style="width:350px"></textarea>
											</div>
										</div>
										<div class="row row2">
											<div class="col-xl-5 col-md-4" style="padding:0 0 0 15px;">
												<select name="selectCmd" id="select-from" multiple="multiple" size="9" class="form-control">
												@foreach ($list2 as $list1)
													<option value="{{ $list1->id }}">{{ $list1->name }}</option>   
												@endforeach
												</select>
												<a href="javascript:void(0);" id="btn-up-source" class="btn btn-success btn-sm" style="width:15%;">Up</a>
												<a href="javascript:void(0);" id="btn-down-source" class="btn btn-success btn-sm" style="width:15%;">Down</a>
											</div>
											<div class="col-xl-2 col-md-4"> <!--<img class="si-glyph" src="svg/si-glyph-arrow-left.svg" />-->
												<a href="javascript:void(0);" id="btn-add" name="btn-add" class="btn btn-primary btn-block">
													Move >>
												</a>
												<a href="javascript:void(0);" id="btn-remove" name="btn-remove" class="btn btn-primary btn-block">
													<< Move
												</a>
											</div>
											<div class="col-xl-5 col-md-4" style="padding:0 15px 0 0;">
												<select name="selectto" id="select-to" multiple="multiple" size="9" class="form-control">
													
												</select>
												<a href="javascript:void(0);" id="btn-up" class="btn btn-success btn-sm" style="width:15%;">Up</a>
												<a href="javascript:void(0);" id="btn-down" class="btn btn-success btn-sm" style="width:15%;">Down</a>
											</div>
										</div>
									<br/><br/>
									<input class="btn btn-primary" style="width:10%;" id="send" type="button" onclick="btCreate()" value="Submit" />
									<a class="btn btn-danger" style="width:10%;" href="{{ URL::action('CommandController@home') }}" role="button"> Back </a>
									{{ csrf_field() }}
									</fieldset>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			</div>
			<div class="col-xl-2 col-md-2"> </div>
		</div>
	</div>
</div>
<br></br>
	@slot('script')
	<script src="js/main.js"></script>
	<script>
		/*$(document).ready(function(){
			$("#send").click(function(){
				var k = $("#select-to > option").length;
			});
		});*/
		
		function btCreate(){
			//alert("hi");
			/* Loop for input selectCMD hidden */
			var k = $("#select-to > option").length;
			
			var hide = '<input type="hidden" name="selectCount" value="'+ k + '">';
			for ( i = 1; i <= k; i++){
				id = $("#select-to > option:nth-child(" + i + ")").val();
				hide += '<input type="hidden" name="selectC'+ i + '" value="' + id + '"/>';
			}
			$('#myForm').append(hide);
			document.getElementById("myForm").submit();
		}

	</script>
	@endslot
@endcomponent