@component('patternmain')

	@slot('head')
	<title>Edit Command Set</title>
	<link rel="stylesheet" href="../css/main.css">
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
			<div class="container box1">
			<div class="row">
				<div class="col-xl-12"> 
					<h4><b> Edit your Command Set </b></h4>
					<div class="row">
						<div class="col-xl-7"> </div>
						<div class="col-xl-5"></div>
					</div>
					<div class="container">
						<div class="row"> </div>
						<form method="post" id="multi" action="../btEditCmdSet">
							<fieldset>
								<div class="row">
									<div class="col-xl-2">
									Name :
									</div>
									<div class="col-xl-10">
										<input class="inbox" type="text" name="NameCmdSet" value="{{ $CmdSetTable[0]->name }}" style="width:350px">
									</div>
								</div>
								<div class="row">
									<div class="col-xl-2">
									Description :
									</div>
									<div class="col-xl-10">
										<textarea class="inbox" type="text" name="DesCmdSet" style="width:350px">{{ $CmdSetTable[0]->description }}</textarea>
									</div>
								</div>
								<div class="row row2">
									<div class="col-xl-5">
										<select name="selectfrom" id="select-from" multiple="multiple" size="9" class="form-control">
										@foreach ($SelectFrom as $SelectFrom2)
											<option value="{{ $SelectFrom2->id }}">{{ $SelectFrom2->name }}</option>
										@endforeach
										</select>
										<a href="javascript:void(0);" id="btn-up-source" class="btn btn-success btn-sm">Up</a>
										<a href="javascript:void(0);" id="btn-down-source" class="btn btn-success btn-sm">Down</a>
									</div>

									<div class="col-xl-2"> <!--<img class="si-glyph" src="svg/si-glyph-arrow-left.svg" />-->
										<a href="javascript:void(0);" id="btn-add" name="btn-add" class="btn btn-primary btn-block">
											Move >>
										</a>
										<a href="javascript:void(0);" id="btn-remove" name="btn-remove" class="btn btn-primary btn-block">
											<< Move
										</a>
									</div>
									<div class="col-xl-5">
										<select name="selectto" id="select-to" multiple="multiple" size="9" class="form-control">
											@foreach ($SelectTo as $SelectTo2)
													<option value="{{ $SelectTo2->id }}">{{ $SelectTo2->name }}</option>   
											@endforeach
										</select>
										<a href="javascript:void(0);" id="btn-up" class="btn btn-success btn-sm">Up</a>
										<a href="javascript:void(0);" id="btn-down" class="btn btn-success btn-sm">Down</a>
									</div>
								</div>
							<br/><br/>
							<input class="btn btn-primary" id="send" type="button" onclick="btEdit()" value="Submit" />
							<a class="btn btn-primary" href="{{ URL::action('CommandController@home') }}" role="button"> Back </a>
							<input type="hidden" name="IdCMDSet" value="{{ $IdCMDSet }}"/>
							{{ csrf_field() }}
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
<br></br>
<script src="../js/main.js"></script>
<script>
	function btEdit(){
		var k = $("#select-to > option").length;
		
		var hide = '<input type="hidden" name="selectCount" value="'+ k + '">';
		for ( i = 1; i <= k; i++){
			id = $("#select-to > option:nth-child(" + i + ")").val();
			hide += '<input type="hidden" name="selectC'+ i + '" value="' + id + '"/>';
		}
		$('#multi').append(hide);
		document.getElementById("multi").submit();
	}
</script>
@endcomponent