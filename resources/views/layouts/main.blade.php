<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>BringFare </title>

	<!-- Bootstrap -->
	<link href="{{ URL::to('src/assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ URL::to('src/assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

	<link rel="stylesheet" href="{{ URL::to('src/assets/owl/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ URL::to('src/assets/owl/owl.theme.default.min.css') }}">

	<link rel="stylesheet" href="{{ URL::to('src/assets/sweetalerts/sweetalert2.min.css') }}">

	<link href="{{ URL::to('src/selectize.css') }}" type="text/css" rel="stylesheet" />
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="{{ URL::to('src/assets/rating/rateit.css') }}">

	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">

	<link href="{{ URL::to('src/css/main.css') }}" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
@include('partials.header')

@yield('content')

@include('partials.footer')

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ URL::to('src/assets/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::to('src/assets/owl/owl.carousel.min.js') }}"></script>

<script src="{{ URL::to('src/assets/sweetalerts/sweetalert2.js') }}"></script>
<script src="{{ URL::to('src/assets/sweetalerts/sweetalert2.common.js') }}"></script>

<!-- include custom script for site  -->
<script src="{{ URL::to('src/selectize.min.js') }}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="{{ URL::to('src/assets/rating/jquery.rateit.min.js') }}"></script>

<script src="{{ URL::to('src/js/main.js') }}"></script>

@yield('js')

</body>
</html>