
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>{{env('APP_NAME')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Version" content="v1.0.0" />
    <!-- favicon -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <!-- Bootstrap -->
    <link href="{{asset('frontAsset/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Icons -->
    <link href="{{asset('frontAsset/css/materialdesignicons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('frontAsset/css/remixicon.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('frontAsset/line.css')}}">
    <!-- SLIDER -->
    <link rel="stylesheet" href="{{asset('frontAsset/css/tiny-slider.css')}}"/>
    <!-- Css -->
    <link href="{{asset('frontAsset/css/style.min.css')}}" rel="stylesheet" type="text/css" />

</head>

<body>
<!-- Loader -->
<div id="preloader">
    <div id="status">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>
</div>
<!-- Loader -->

<!-- Navbar STart -->
<header id="topnav" class="navigation sticky">
    <div class="container">
        <!-- Logo container-->
        <div>
            <a class="logo" href="index.html">
                <img src="frontAsset/images/logo-dark.png" class="l-dark" height="22" alt="">
                <img src="frontAsset/images/logo-light.png" class="l-light" height="22" alt="">
            </a>
        </div>
        <!-- End Logo container-->
        @if(auth()->user())
        <ul class="dropdowns list-inline mb-0">

            <li class="list-inline-item mb-0 ms-1">
                <div class="dropdown dropdown-primary">
                    <button type="button" class="btn btn-pills btn-soft-primary dropdown-toggle p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="frontAsset/images/doctors/01.jpg" class="avatar avatar-ex-small rounded-circle" alt=""></button>

                    <div class="dropdown-menu dd-menu dropdown-menu-end bg-white shadow border-0 mt-3 py-3" style="min-width: 200px;">
                        <a class="dropdown-item d-flex align-items-center text-dark" href="doctor-profile.html">
                            <img src="frontAsset/images/doctors/01.jpg" class="avatar avatar-md-sm rounded-circle border shadow" alt="">
                            <div class="flex-1 ms-2">
                                <span class="d-block mb-1">{{auth()->user()->name}}</span>
                            </div>
                        </a>
                        <a class="dropdown-item text-dark" href="{{route('home')}}">
                            <span class="mb-0 d-inline-block me-1"><i class="uil uil-dashboard align-middle h6"></i></span>
                            Dashboard</a>

                        <a class="dropdown-item text-dark" href="#"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <span class="mb-0 d-inline-block me-1"><i class="uil uil-sign-out-alt align-middle h6"></i></span> Deconnexion</a>
                    </div>
                </div>
            </li>
        </ul>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        @endif
        <div class="menu-extras">
            <div class="menu-item">
                <!-- Mobile menu toggle-->
                <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </div>
        </div>

    </div>
</header>
<!-- Navbar End -->

<!-- Start Hero -->
<section class="bg-half-260 d-table w-100" style="background: url('{{asset('frontAsset/images/bg/01.jpg')}}') center;">
    <div class="bg-overlay"></div>
    <div class="container">
        <div class="row mt-5 mt-lg-0">
            <div class="col-12">
                <div class="heading-title">
                    <img src="frontAsset/images/logo-icon.png" class="avatar avatar-md-sm" alt="">
                    <h4 class="display-4 fw-bold text-white mt-3 mb-4">Rencontrez les <br> Meilleurs docteurs</h4>
                    <p class="para-desc text-white-50 mb-0">
                        Si vous avez besoin d'obtenir une assistance immédiate efficace, un traitement d'urgence ou une simple consultation. Prenez rendez-vous</p>


                    <div class="mt-4 pt-2">
                        <a href="{{route('login')}}" class="btn btn-primary">Se connecter</a>
                        <br>
                        <br>

                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- End Hero -->

<script src="{{asset('frontAsset/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('frontAsset/js/tiny-slider.js')}}"></script>
<script src="{{asset('frontAsset/js/tiny-slider-init.js')}}"></script>
<script src="{{asset('frontAsset/js/counter.init.js')}}"></script>
<script src="{{asset('frontAsset/js/feather.min.js')}}"></script>
<script src="{{asset('frontAsset/js/app.js')}}"></script>
</body>
</html>