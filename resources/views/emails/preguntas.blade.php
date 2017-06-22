<!DOCTYPE html>
<html>
<body>
	<ul>
		@foreach ($fields as $key => $value)
	        <li><strong>{{ $key }}:</strong> {{$value}}</li>
	    @endforeach
    </ul>
</body>
</html>