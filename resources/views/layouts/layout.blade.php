@include('layouts.header')
@include('layouts.navbar')
@if(auth()->user()->role_id == 3)
    @include('layouts.sidebarAdmin')
    @else
    @include('layouts.sidebar')
@endif
        @yield('content')
@include('layouts.footer')