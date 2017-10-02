<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title> LAB2 TEST</title>
	</head>
    <body>
				@foreach ($num2 as $num)
						<br\>{{ $num ->name }} </br>
				@endforeach
				
		
    </body>
</html>