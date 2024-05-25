<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/open-iconic-bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/ionicons.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.timepicker.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/icomoon.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <title>@yield('title')</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-ligh" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="{{ route('index') }}">MAJIKROOM</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" style="color: black" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="{{ route('index') }}" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="{{ route('rooms') }}" class="nav-link">Rooms</a></li>
                    <li class="nav-item"><a href="{{ route('restaurant') }}" class="nav-link">Restaurant</a></li>
                    <li class="nav-item"><a href="{{ route('about') }}" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="{{ route('blog') }}" class="nav-link">Blog</a></li>
                    <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link">Contact</a></li>
                </ul>
            </div>
        </div>
        <div class="d-flex gap-3">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="/admin/login" class="nav-link">Admin</a></li>
                <li class="nav-item"><a href="/receptionist" class="nav-link">Receptionist</a></li>
            </ul>
        </div>
    </nav>
    <div class="">
        <div class="">
            @yield('content')
        </div>
    </div>
     <!-- loader -->
     <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
            stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
            stroke-miterlimit="10" stroke="#F96D00" />
    </svg></div>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/aos.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.mb.YTPlayer.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datepicker.js') }}"></script>
    <!-- // <script src="{{ asset('assets/js/jquery.timepicker.min.js') }}"></script> -->
    <script src="{{ asset('assets/js/scrollax.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{ asset('assets/js/google-map.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <footer class="ftco-footer ftco-bg-dark ftco-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">MAJIKROOM</h2>
                        <p>
                            MAJIKROOM Hotel is committed to providing an exceptional experience for its guests, blending
                            comfort, hospitality, and convenience. Our rooms are equipped with modern facilities to
                            ensure a
                            pleasant stay. Located in the heart of the city, MAJIKROOM offers easy access to local
                            attractions. Book now for an unforgettable experience.
                        </p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                            <li class="ftco-animate">
                                <a href="#"><span class="icon-twitter"></span></a>
                            </li>
                            <li class="ftco-animate">
                                <a href="#"><span class="icon-facebook"></span></a>
                            </li>
                            <li class="ftco-animate">
                                <a href="#"><span class="icon-instagram"></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-5">
                        <h2 class="ftco-heading-2">Useful Links</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">Blog</a></li>
                            <li><a href="#" class="py-2 d-block">Rooms</a></li>
                            <li><a href="#" class="py-2 d-block">Amenities</a></li>
                            <li><a href="#" class="py-2 d-block">Gift Card</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Privacy</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">Career</a></li>
                            <li><a href="#" class="py-2 d-block">About Us</a></li>
                            <li><a href="#" class="py-2 d-block">Contact Us</a></li>
                            <li><a href="#" class="py-2 d-block">Services</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Have a Questions?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li>
                                    <span class="icon icon-map-marker"></span><span class="text"> 203 Avenue Hassan
                                        II,
                                        Kénitra, Maroc</span>
                                </li>
                                <li>
                                    <a href="#"><span class="icon icon-phone"></span><span class="text">+212
                                            651
                                            53 69 25</span></a>
                                </li>
                                <li>
                                    <a href="#"><span class="icon icon-envelope"></span><span
                                            class="text">info@majikroom.com</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row"></div>
        </div>
    </footer>
</body>

</html>
