@component('patternmain')

	@slot('head')
	<title>Home</title>
	<link rel="stylesheet" href="css/main.css">
	
	@endslot
	
	<div class="container">
        <div class="row">
			<div class="col-xl-2"> <p id="demo"></p> </div>
            <div class="col-xl-8">
                <p id="check"> </p>
			</div>
			<div class="col-xl-2"></div>
		</div>
	</div>

	@slot('script')
	<script>
		
		$(document).ready(function(){
			var str = "pls your vin here TTS";
			var keyword = "TTS";
			var desSelect = "#check";
			var state = resultSearchCheck(str,keyword,desSelect);
		});
		function resultSearchCheck(str,keyword,desSelect){
			var state = str.search(keyword) == -1;
			var show = "";
			if(state){
				show = '<img src="'+"{{URL::asset('/picture/nok.svg')}}" +'" height="30" width="30">' ;
			} else {
				show = '<img src="'+"{{URL::asset('/picture/Ok.ico')}}" +'" height="30" width="30">' ;
			};
			//document.getElementById("demo").innerHTML = pos;
			$(desSelect).html(show);
			return state;
		}
	</script>
	@endslot
@endcomponent