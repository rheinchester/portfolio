<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>{{config('app.name', 'Jacob okoro')}}</title>
		<link rel="stylesheet" type="text/css" href="/css/app.css">
	</head>

	<body>
		@include('inc.navbar')
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-8">
					@include('inc.messages')
					@yield('content')
				</div>
				<div class="col-md-4 col-lg-4">
					@include('inc.sidebar')
				</div>
			</div>
		</div>
		<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
		<script>
			CKEDITOR.replace( 'article-ckeditor' );
		</script>
	</body>
</html>
