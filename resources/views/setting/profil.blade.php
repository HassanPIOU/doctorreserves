@extends('layouts.layout')
@section('content')
    <div class="page-wrapper">
        <div class="container-fluid">
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Mon profil</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">{{env('APP_NAME')}}</a></li>
                <li class="breadcrumb-item active">Mon profil</li>
            </ol>
        </div>
    </div>
</div>
<div class="row">
    <!-- Column -->
    <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
            <div class="user-bg"> <img width="100%" alt="user" id="profilUser" src="@if(auth()->user()->avatar  == NULL){{asset('frontAsset/images/client/09.jpg')}} @else {{asset('uploads/avatar/')}}{!! DIRECTORY_SEPARATOR !!}{{auth()->user()->avatar}} @endif"> </div>
            <div class="card-body">
                <!-- .row -->
                <div class="row text-center m-t-10">
                    <div class="col-md-12 b-r">
                        <strong>Nom</strong>
                        <p>{{auth()->user()->name}}</p>
                    </div>
                </div>
                <hr>
                <!-- /.row -->
                <!-- .row -->
                <div class="row text-center m-t-10">
                    <div class="col-md-12 b-r"><strong>Email</strong>
                        <p>{{auth()->user()->email}}</p>
                    </div>
                </div>
                <!-- /.row -->
                <hr>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs profile-tab" role="tablist">
                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Profil</a> </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">

                <div class="tab-panen  active" id="settings" role="tabpanel">
                    <div class="card-body">
                        @if(session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session()->get('success') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                            @if(session()->has('error'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>{{ session()->get('error') }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                        <form class="form-horizontal form-material" method="post" action="{{route('update.profil')}}">
                            @csrf
                            <div class="form-group">
                                <label class="col-md-12">Nom complet</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Johnathan Doe" name="name" value="{{auth()->user()->name}}" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="example-email" class="col-md-12">Email</label>
                                <div class="col-md-12">
                                    <input type="email" placeholder="johnathan@admin.com" value="{{auth()->user()->email}}" class="form-control form-control-line" name="email" id="example-email">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success">Mettre a jour</button>
                                </div>
                            </div>
                        </form>

                            <br>
                            <br>
                            <label for="photoprofil" class="btn btn-success">Mofifier la photo de profil</label>
                            <input type="file" style="display: none;" id="photoprofil" onchange="setPictureUser(this,'profilUser')">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>

        </div>
    </div>
@endsection