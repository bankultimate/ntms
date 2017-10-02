<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title> LAB TEST</title>
	</head>
    <body>
		<table border=5>
		@foreach ($tests as $test)
			<tr>
				<td>{{ $test->id }}</td>
				<td>{{ $test->set_name }}</td>
				<td>{{ $test->cmd_name }}</td>
			</tr>
		@endforeach
		</table>
    </body>
</html>