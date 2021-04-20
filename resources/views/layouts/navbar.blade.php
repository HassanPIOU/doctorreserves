<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <!-- ============================================================== -->
        <!-- Logo -->
        <!-- ============================================================== -->
        <div class="navbar-header">
            <a class="navbar-brand" href="/">
                <!--End Logo icon -->
                <span class="hidden-xs"><span class="font-bold">{{env("APP_NAME")}}</span></span>
            </a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav mr-auto">
                <!-- This is  -->
                <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                <!-- ============================================================== -->
                <!-- Search -->
                <!-- ============================================================== -->

            </ul>
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
            <ul class="navbar-nav my-lg-0">


                <li class="nav-item dropdown u-pro">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="#" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <img src="@if(auth()->user()->avatar  == NULL){{asset('frontAsset/images/client/09.jpg')}} @else {{asset('uploads/avatar/')}}{!! DIRECTORY_SEPARATOR !!}{{auth()->user()->avatar}} @endif" alt="user" class=""> <span class="hidden-md-down">{{auth()->user()->name}} &nbsp;<i class="icon-arrow-down"></i></span> </a>
                    <div class="dropdown-menu dropdown-menu-right animated flipInY">
                        <!-- text-->
                        <a href="{{route('account')}}" class="dropdown-item"><i class="ti-user"></i> Mon Profil</a>
                        <div class="dropdown-divider"></div>
                        <!-- text-->
                        <a href="#" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"  class="dropdown-item"><i class="icon-power"></i> Deconnexion</a>
                        <!-- text-->
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>