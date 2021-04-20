<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>{{env('APP_NAME')}} | patient</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Version" content="v1.0.0" />
    
    <link rel="shortcut icon" href="frontAsset/images/favicon.ico">
    <link href="{{asset('frontAsset/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('frontAsset/css/select2.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontAsset/css/flatpickr.min.css')}}">
    <link href="{{asset('frontAsset/css/jquery.timepicker.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('frontAsset/css/materialdesignicons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('frontAsset/css/remixicon.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('frontAsset/line.css')}}">
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
<header id="topnav" class="defaultscroll sticky">
    <div class="container">
        <!-- Logo container-->
        <div>
            <a class="logo" href="/">
                <img src="{{asset('frontAsset/images/logo-dark.png')}}" height="22" alt="">
            </a>
        </div>
        <!-- End Logo container-->
        <ul class="dropdowns list-inline mb-0">

            <li class="list-inline-item mb-0 ms-1">
                <div class="dropdown dropdown-primary">
                    <button type="button" class="btn btn-pills btn-soft-primary dropdown-toggle p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="@if(auth()->user()->avatar  == NULL){{asset('frontAsset/images/client/09.jpg')}} @else {{asset('uploads/avatar/')}}{!! DIRECTORY_SEPARATOR !!}{{auth()->user()->avatar}} @endif" class="avatar avatar-ex-small rounded-circle" alt=""></button>
                    <div class="dropdown-menu dd-menu dropdown-menu-end bg-white shadow border-0 mt-3 py-3" style="min-width: 200px;">
                        <a class="dropdown-item d-flex align-items-center text-dark" href="doctor-profile.html">
                            <img src="@if(auth()->user()->avatar  == NULL){{asset('frontAsset/images/client/09.jpg')}} @else {{asset('uploads/avatar/')}}{!! DIRECTORY_SEPARATOR !!}{{auth()->user()->avatar}} @endif" class="avatar avatar-md-sm rounded-circle border shadow" alt="">
                            <div class="ms-2">
                                <span class="d-block mb-1">{{auth()->user()->name}}</span>
                            </div>
                        </a>
                        <a class="dropdown-item text-dark" href="javascript:void(0)"    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><span class="mb-0 d-inline-block me-1">
                                <i class="uil uil-sign-out-alt align-middle h6"></i>
                            </span> Logout</a>
                    </div>
                </div>
            </li>
        </ul>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
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


    </div><!--end container-->
</header><!--end header-->
<!-- Navbar End -->

<!-- Start -->
<section class="bg-hero">
    <div class="container">
        <div class="row mt-lg-5">
            <div class="col-md-6 col-lg-4">
                <div class="rounded shadow overflow-hidden sticky-bar">
                    <div class="card border-0">
                        <img src="{{asset('frontAsset/images/bg/bg-profile.jpg')}}" class="img-fluid" alt="">
                    </div>

                    <div class="text-center avatar-profile margin-nagative mt-n5 position-relative pb-4 border-bottom">
                        <img src="@if(auth()->user()->avatar  == NULL){{asset('frontAsset/images/client/09.jpg')}} @else {{asset('uploads/avatar/')}}{!! DIRECTORY_SEPARATOR !!}{{auth()->user()->avatar}} @endif" class="rounded-circle shadow-md avatar avatar-md-md" alt="">
                        <h5 class="mt-3 mb-1">{{auth()->user()->name}}</h5>
                    </div>

                    <div class="list-unstyled p-4">
                        <div class="d-flex align-items-center mt-2">
                            <i class="uil uil-user align-text-bottom text-primary h5 mb-0 me-2"></i>
                            <h6 class="mb-0">Email</h6>
                            <p class="text-muted mb-0 ms-2">{{auth()->user()->email}}</p>
                        </div>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-8 col-md-6 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <div class="card border-0 shadow overflow-hidden">
                    <ul class="nav nav-pills nav-justified flex-column flex-sm-row rounded-0 shadow overflow-hidden bg-light mb-0" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link rounded-0 active" id="overview-tab" data-bs-toggle="pill" href="#pills-overview" role="tab" aria-controls="pills-overview" aria-selected="false">
                                <div class="text-center pt-1 pb-1">
                                    <h4 class="title fw-normal mb-0">Rendez-vous</h4>
                                </div>
                            </a><!--end nav link-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link rounded-0" id="experience-tab" data-bs-toggle="pill" href="#pills-experience" role="tab" aria-controls="pills-experience" aria-selected="false">
                                <div class="text-center pt-1 pb-1">
                                    <h4 class="title fw-normal mb-0">Historique</h4>
                                </div>
                            </a><!--end nav link-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link rounded-0" id="account-tab" data-bs-toggle="pill" href="#pills-account" role="tab" aria-controls="pills-account" aria-selected="false">
                                <div class="text-center pt-1 pb-1">
                                    <h4 class="title fw-normal mb-0">Mon compte</h4>
                                </div>
                            </a><!--end nav link-->
                        </li>
                    </ul>

                    <div class="tab-content p-4" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-overview" role="tabpanel" aria-labelledby="overview-tab">
                            <a href="#" class="btn btn-icon btn-primary ml-2 pull-right" data-bs-toggle="modal" data-bs-target="#view-invoice">
                                <i class="uil uil-plus icons"></i></a>

                            <div class="row">
                                <div class="col-lg-12 col-12 mt-4">
                                    <h5>Rendez-vous </h5>
                                      @foreach($apointment as $ap)
                                        @if($ap->eventStatut  != 3)
                                    <div class="d-flex justify-content-between align-items-center rounded p-3 shadow mt-3">
                                        <i class="ri-heart-pulse-line h3 fw-normal text-primary mb-0"></i>
                                        <div class="flex-1 overflow-hidden ms-2">
                                            <h6 class="mb-0">{{$ap->poste}}</h6>
                                            <p class="text-muted mb-0 text-truncate small">Dr. {{$ap->name}}</p>
                                        </div>
                                        <span class="mb-0">{!! date('d , M Y',strtotime($ap->date)) !!}  {!! date('H:i',strtotime($ap->time)) !!}  </span>
                                        @if($ap->eventStatut == 1)
                                            <span style="margin-left: 50px;" class="badge badge-info">En attente</span>
                                        @elseif($ap->eventStatut == 2)
                                            <span style="margin-left: 50px;" class="badge badge-success">Valider</span>
                                        @elseif($ap->eventStatut == 4)
                                            <span style="margin-left: 50px;" class="badge badge-danger">Annulé</span>
                                        @endif

                                    </div>
                                          @endif
                                          @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-experience" role="tabpanel" aria-labelledby="experience-tab">
                            <h5 class="mb-0">Historique :</h5>
                            <div class="row">
                                <div class="col-lg-12 col-12 mt-4">
                                    @foreach($apointment as $ap)
                                        @if($ap->eventStatut == 3)
                                        <div class="d-flex justify-content-between align-items-center rounded p-3 shadow mt-3">
                                            <i class="ri-heart-pulse-line h3 fw-normal text-primary mb-0"></i>
                                            <div class="flex-1 overflow-hidden ms-2">
                                                <h6 class="mb-0">{{$ap->poste}}</h6>
                                                <p class="text-muted mb-0 text-truncate small">Dr. {{$ap->name}}</p>
                                            </div>
                                            <span class="mb-0">{!! date('d , M Y',strtotime($ap->date)) !!}  {!! date('H:i',strtotime($ap->time)) !!}  </span>
                                        </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-account" role="tabpanel" aria-labelledby="account-tab">
                            <h5 class="mb-0">Compte :</h5>
                            <div class="row align-items-center mt-4">
                                <div class="col-lg-2 col-md-4">
                                    <img src="@if(auth()->user()->avatar  == NULL){{asset('frontAsset/images/client/09.jpg')}} @else {{asset('uploads/avatar/')}}{!! DIRECTORY_SEPARATOR !!}{{auth()->user()->avatar}} @endif" id="profilAvatar" class="avatar avatar-md-md rounded-pill shadow mx-auto d-block" alt="">
                                </div><!--end col-->

                                <div class="col-lg-5 col-md-8 text-center text-md-start mt-4 mt-sm-0">
                                    <h6 class="">Changer de profil</h6>
                                </div><!--end col-->

                                <div class="col-lg-5 col-md-12 text-lg-right text-center mt-4 mt-lg-0">
                                    <label for="upload" class="btn btn-primary">Upload
                                        <input type="file" accept="image/*" id="upload" style="display: none;" onchange="setPicture(this,'profilAvatar')">
                                    </label>

                                </div><!--end col-->
                            </div><!--end row-->


                            <div id="updateResultupdate"></div>

                            <div class="mt-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Nom</label>
                                            <input name="name" id="lastname" type="text" value="{!! explode(" ",auth()->user()->name)[1] !!}" class="form-control" placeholder="First Name :">
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Prenom</label>
                                            <input name="name" id="firstname" type="text" class="form-control" value="{!! explode(" ",auth()->user()->name)[0] !!}" placeholder="Last Name :">
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input name="email" id="email" type="email" value="{{auth()->user()->email}}" class="form-control" placeholder="Your email :">
                                        </div>
                                    </div><!--end col-->


                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <button class="btn btn-primary" onclick="updateMypatientInfo()">Modifier</button>
                                    </div>
                                </div>

                                <div style="margin-top: 20px;" id="updateResult"></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- End -->

<!-- Start -->
<footer class="bg-footer">

    <div class="container mt-5">
        <div class="pt-4 footer-bar">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="text-sm-start text-center">
                        <p class="mb-0"><script>document.write(new Date().getFullYear())</script> . Design with <i class="mdi mdi-heart text-danger"></i> by <a href="http://shreethemes.in/" target="_blank" class="text-reset">Shreethemes</a>.</p>
                    </div>
                </div><!--end col-->

                <div class="col-sm-6 mt-4 mt-sm-0">
                    <ul class="list-unstyled footer-list text-sm-end text-center mb-0">
                        <li class="list-inline-item"><a href="terms.html" class="text-foot me-2">Terms</a></li>
                        <li class="list-inline-item"><a href="privacy.html" class="text-foot me-2">Privacy</a></li>
                        <li class="list-inline-item"><a href="aboutus.html" class="text-foot me-2">About</a></li>
                        <li class="list-inline-item"><a href="contact.html" class="text-foot me-2">Contact</a></li>
                    </ul>
                </div><!--end col-->
            </div><!--end row-->
        </div>
    </div><!--end container-->
</footer><!--end footer-->
<!-- End -->

<!-- Back to top -->
<a href="#" onclick="topFunction()" id="back-to-top" class="btn btn-icon btn-pills btn-primary back-to-top"><i data-feather="arrow-up" class="icons"></i></a>
<!-- Back to top -->

 @include('patient._addrdv')


<!-- javascript -->
<script src="{{asset('frontAsset/js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('frontAsset/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('frontAsset/js/select2.min.js')}}"></script>
<script src="{{asset('frontAsset/js/select2.init.js')}}"></script>
<script src="{{asset('frontAsset/js/flatpickr.min.js')}}"></script>
<script src="{{asset('frontAsset/js/flatpickr.init.js')}}"></script>
<script src="{{asset('frontAsset/js/jquery.timepicker.min.js')}}"></script>
<script src="{{asset('frontAsset/js/timepicker.init.js')}}"></script>
<script src="{{asset('frontAsset/js/feather.min.js')}}"></script>
<script src="{{asset('frontAsset/js/app.js')}}"></script>
<script src="{{asset('externe/js/app.js')}}"></script>
</body>

</html>