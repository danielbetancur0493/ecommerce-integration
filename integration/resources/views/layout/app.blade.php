<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>@yield('title', 'Default') </title>
	<link rel="stylesheet" type="text/css" href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('plugins/chosen/chosen.css')}}">
	<link rel="stylesheet" href="{{asset('plugins/trumbowyg/dist/ui/trumbowyg.css')}}">
	<link rel="stylesheet" href="{{asset('plugins/fileinput/css/fileinput.css')}}">
	<link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body style="font-family: 'Dosis', sans-serif;">
	@include('layout.template.nav')
	<section>
		<div class="container">
			@include('flash::message')
			@include('layout.template.error')
			@yield('content')
		</div>
	</section>
	<footer class="">
		<div class="container">
			@include('layout.template.footer')
		</div>
		
	</footer>



	<script src="{{asset('plugins/jquery/jquery-3.2.1.js')}}"></script>
	<script src="{{asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('plugins/chosen/chosen.jquery.js')}}"></script>
	<script src="{{ asset('plugins/trumbowyg/dist/trumbowyg.min.js')}}"></script>
	<script src="{{asset('plugins/fileinput/js/fileinput.js')}}"></script>
	@yield('js')
	
</body>
</html>