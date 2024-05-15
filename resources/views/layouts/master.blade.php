<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('assets/css/open-iconic-bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}" />

    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}" />

    <link rel="stylesheet" href="{{asset('assets/css/aos.css')}}" />

    <link rel="stylesheet" href="{{asset('assets/css/ionicons.min.css')}}" />

    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-datepicker.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/jquery.timepicker.css')}}" />

    <link rel="stylesheet" href="{{asset('assets/css/flaticon.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/icomoon.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
    <title>@yield('title')</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-ligh" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="{{route('index')}}">MAJIKRAM</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" style="color: black" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="{{route('index')}}" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="{{route('rooms')}}" class="nav-link">Rooms</a></li>
	          <li class="nav-item"><a href="{{route('restaurant')}}" class="nav-link">Restaurant</a></li>
	          <li class="nav-item active"><a href="{{route('about')}}" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="{{route('blog')}}" class="nav-link">Blog</a></li>
	          <li class="nav-item"><a href="{{route('contact')}}" class="nav-link">Contact</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <div class="">
        <div class="">
            @yield('content')
        </div>
    </div>

      <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="{{asset("assets/js/jquery.min.js")}}"></script>
    <script src="{{asset("assets/js/jquery-migrate-3.0.1.min.js")}}"></script>
    <script src="{{asset("assets/js/popper.min.js")}}"></script>
    <script src="{{asset("assets/js/bootstrap.min.js")}}"></script>
    <script src="{{asset("assets/js/jquery.easing.1.3.js")}}"></script>
    <script src="{{asset("assets/js/jquery.waypoints.min.js")}}"></script>
    <script src="{{asset("assets/js/jquery.stellar.min.js")}}"></script>
    <script src="{{asset("assets/js/owl.carousel.min.js")}}"></script>
    <script src="{{asset("assets/js/jquery.magnific-popup.min.js")}}"></script>
    <script src="{{asset("assets/js/aos.js")}}"></script>
    <script src="{{asset("assets/js/jquery.animateNumber.min.js")}}"></script>
    <script src="{{asset("assets/js/jquery.mb.YTPlayer.min.js")}}"></script>
    <script src="{{asset("assets/js/bootstrap-datepicker.js")}}"></script>
    <!-- // <script src="{{asset("assets/js/jquery.timepicker.min.js")}}"></script> -->
    <script src="{{asset("assets/js/scrollax.min.js")}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{asset("assets/js/google-map.js")}}"></script>
    <script src="{{asset("assets/js/main.js")}}"></script>
</body>

</html>
