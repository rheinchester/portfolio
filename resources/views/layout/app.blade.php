<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Acme</title>
	<link rel="stylesheet" type="text/css" href="/css/app.css">
</head>
<body>
	
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-lg-8">
				@yield('content')
			</div>
			<div class="col-md-4 col-lg-4">
				@include('inc.sidebar')
			</div>
		</div>
	</div>

</body>
</html>
