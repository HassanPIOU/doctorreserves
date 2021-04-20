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
                <li> <a class="waves-effect waves-dark" href="{{route("medecine.home")}}">
                        <i class="icon-speedometer"></i><span class="hide-menu">Dashboard</span></a>
                </li>
                @if(auth()->user()->plan_id == 2)
                <li> <a class="waves-effect waves-dark" href="{{route('medecine.calendar')}}">
                        <i class="icon-calender"></i><span class="hide-menu">Calendrier</span></a>
                </li>
                @endif
                <li class="nav-small-cap">--- PROFESSIONAL</li>
                <li> <a class=" waves-effect waves-dark" href="{{route('medecine.rendez')}}"
                        ><i class="ti-menu"></i><span class="hide-menu">Rendez-vous</span></a>
                </li>

                <li> <a class=" waves-effect waves-dark" href="{{route('medecine.historic')}}"
                    ><i class="ti-menu"></i><span class="hide-menu">Historique</span></a>
                </li>

                <li> <a class="waves-effect waves-dark" href="{{route('medecine.patient')}}" >
                        <i class="icon-people"></i><span class="hide-menu">Patients</span></a>
                </li>


                <li class="nav-small-cap">--- PARAMETRE</li>
                <li>
                    <a class="waves-effect waves-dark" href="{{route('medecine.tarif')}}" >
                        <i class="icons-Gear text-danger"></i>
                        <span class="hide-menu">Paramètres</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>