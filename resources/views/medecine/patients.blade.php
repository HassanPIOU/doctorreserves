@extends('layouts.layout')
@section('content')
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h4 class="text-themecolor">Patients</h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">{{env('APP_NAME')}}</a></li>
                            <li class="breadcrumb-item active">Patients</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="col-md-12">
                <div class="row el-element-overlay">
                    @if(count($patientList) == 0)
                       <div class="col-lg-12">
                           <div class="card">
                               <div class="card-body">
                                   <div class="col-lg-12">
                                       <h4 class="text-center" style="padding: 100px;">Liste des patients vide</h4>
                                   </div>
                               </div>
                           </div>
                       </div>
                    @endif
                    @foreach($patientList as $patient)
                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="el-card-item">
                                    <div class="el-card-avatar el-overlay-1">
                                        @if($patient->avatar == NULL)
                                        <img src="{{asset('externe/img/user.png')}}" alt="user" />
                                        @else
                                            <img src="{{asset('uploads/avatar/')}}{!! DIRECTORY_SEPARATOR !!}{{$patient->avatar}}" alt="user" />
                                        @endif
                                        <div class="el-overlay">
                                            <ul class="el-info">
                                                @if($patient->avatar == NULL)
                                                    <li>
                                                        <a class="btn default btn-outline image-popup-vertical-fit"
                                                           href="{{asset('uploads/avatar/')}}{!! DIRECTORY_SEPARATOR !!}{{$patient->avatar}}"><i class="icon-magnifier"></i>
                                                        </a>
                                                    </li>
                                                @else
                                                    <li>
                                                        <a class="btn default btn-outline image-popup-vertical-fit"
                                                           href="{{asset('uploads/avatar/'.$patient->avatar)}}"><i class="icon-magnifier"></i>
                                                        </a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="el-card-content">
                                        <h3 class="box-title">{{$patient->name}}</h3> <small>{{$patient->email}}</small>
                                        <br/>
                                    </div>
                                </div>
                            </div>
                        </div>
                   @endforeach
                </div>

            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
    </div>
@endsection