@extends('layouts.layout')
@section('content')
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h4 class="text-themecolor">Mon calendrier</h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">{{env('APP_NAME')}}</a></li>
                            <li class="breadcrumb-item active">Mon calendrier</li>
                        </ol>
                    </div>
                </div>
            </div>

            <textarea name="" id="datacalendar" cols="30" style="display: none;" rows="10">{!! json_encode($apointments) !!}</textarea>
            <textarea name="" id="patientList" cols="30" style="display: none;" rows="10">{!! json_encode($patientList) !!}</textarea>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card-body b-l calender-sidebar">
                                        <div id="calendar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" id="myId" value="{{auth()->user()->id}}">
             <!-- BEGIN MODAL -->
            <div class="modal none-border" id="my-event">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><strong>Ajouter un rendez-vous</strong></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success save-event waves-effect waves-light">Ajouter</button>
                            <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Supprimer</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

@section('calendarCss')
    <link rel="stylesheet" type="text/css"
          href="{{asset('backAsset/plugins/calendar/dist/fullcalendar.css')}}">
@endsection
@section('calendarJs')
    <script src="{{asset('backAsset/plugins/calendar/jquery-ui.min.js')}}"></script>
    <script src="{{asset('backAsset/plugins/moment/moment.js')}}"></script>
    <script src='{{asset('backAsset/plugins/calendar/dist/fullcalendar.min.js')}}'></script>
    <script src="{{asset('backAsset/plugins/calendar/dist/cal-init.js')}}"></script>
@endsection


@endsection