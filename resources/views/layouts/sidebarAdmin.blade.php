<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="user-pro"> <a class=" waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <img src="@if(auth()->user()->avatar  == NULL){{asset('frontAsset/images/client/09.jpg')}} @else {{asset('uploads/avatar/')}}{!! DIRECTORY_SEPARATOR !!}{{auth()->user()->avatar}} @endif" alt="user-img" class="img-circle">
                        <span class="hide-menu">{{auth()->user()->name}}</span></a>
                </li>
                <li class="nav-small-cap">---PERSONAL</li>
                <li> <a class="waves-effect waves-dark" href="{{route("admin.home")}}">
                        <i class="icon-speedometer"></i><span class="hide-menu">Dashboard</span></a>
                </li>
                <li class="nav-small-cap">--- PROFESSIONAL</li>
                <li> <a class=" waves-effect waves-dark" href="{{route('admin.entreprise')}}"
                    ><i class="ti-home"></i><span class="hide-menu">Entreprises</span></a>
                </li>
                <li> <a class=" waves-effect waves-dark" href="{{route('admin.service')}}"
                    ><i class="ti-menu"></i><span class="hide-menu">Services</span></a>
                </li>

                <li> <a class="waves-effect waves-dark" href="{{route('admin.medecine')}}" >
                        <i class="icon-people"></i><span class="hide-menu">Médécins</span></a>
                </li>

                <li> <a class="waves-effect waves-dark" href="{{route('admin.patient')}}" >
                        <i class="icon-people"></i><span class="hide-menu">Patients</span></a>
                </li>

                <li> <a class="waves-effect waves-dark" href="{{route('admin.payment')}}" >
                        <i class="icons-Money"></i><span class="hide-menu">Paiement</span></a>
                </li>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>