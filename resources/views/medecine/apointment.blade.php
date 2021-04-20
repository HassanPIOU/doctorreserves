@extends('layouts.layout')
@section('content')
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h4 class="text-themecolor">Mes rendez-vous</h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">{{env('APP_NAME')}}</a></li>
                            <li class="breadcrumb-item active">Rendez-vous</li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Liste</h4>
                            <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                            <div class="table-responsive m-t-40">
                                <table id="example23"
                                       class="display nowrap table table-hover table-striped table-bordered"
                                       cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Objet</th>
                                        <th>patient</th>
                                        <th>email</th>
                                        <th>date</th>
                                        <th>Heure</th>
                                        <th>Statut</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($apointments as $rendez)
                                        <tr>
                                            <td style="text-transform: capitalize">{{$rendez->event_name}}</td>
                                            <td>{{$rendez->name}}</td>
                                            <td>{{$rendez->email}}</td>
                                            <td>{!! date('d, M Y',strtotime($rendez->date)) !!}</td>
                                            <td>{{$rendez->time}}</td>
                                            <td>
                                                @if($rendez->eventStatut == 1)
                                                    <span  class="badge badge-info">En attente</span>
                                                @elseif($rendez->eventStatut == 2)
                                                    <span  class="badge badge-success">Valider</span>
                                                    @else
                                                    <span  class="badge badge-success">Traiter</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($rendez->eventStatut == 1)
                                                <a href="javascript:void(0)" class="btn btn-sm btn-success" onclick="ActionApointment('{{$rendez->eventId}}','2')"> <i class="icon-check text-white" title="Valider le rendez-vous"></i></a>
                                                @elseif($rendez->eventStatut == 2)
                                                <a href="javascript:void(0)"  class="btn btn-sm btn-success" onclick="ActionApointment('{{$rendez->eventId}}','3')"> <i class="icon-docs text-white" title="valider la consultation"></i></a>
                                                @endif
                                                <a href="javascript:void(0)"  class="btn btn-sm btn-danger" onclick="ActionApointment('{{$rendez->eventId}}','4')"><i class="icon-trash text-white" title="Annuler la consultation"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

            </div>

        </div>

        </div>

    </div>

    @section('apointmentCss')
        <link rel="stylesheet" type="text/css"
              href="{{asset('backAsset/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css')}}">
        <link rel="stylesheet" type="text/css"
              href="{{asset('backAsset/plugins/datatables.net-bs4/css/responsive.dataTables.min.css')}}">
    @endsection
    @section('apointmentJs')
        <script src="{{asset('backAsset/plugins/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('backAsset/plugins/datatables.net-bs4/js/dataTables.responsive.min.js')}}"></script>
        <!-- start - This is for export functionality only -->
        <script src="{{asset('externe/buttons/1.5.1/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('externe/buttons/1.5.1/js/buttons.flash.min.js')}}"></script>
        <script src="{{asset('externe/ajax/libs/jszip/3.1.3/jszip.min.js')}}"></script>
        <script src="{{asset('externe/ajax/libs/pdfmake/0.1.32/pdfmake.min.js')}}"></script>
        <script src="{{asset('externe/ajax/libs/pdfmake/0.1.32/vfs_fonts.js')}}"></script>
        <script src="{{asset('externe/buttons/1.5.1/js/buttons.html5.min.js')}}"></script>
        <script src="{{asset('externe/buttons/1.5.1/js/buttons.print.min.js')}}"></script>
        <!-- end - This is for export functionality only -->
        <script>
            $(function () {
                $('#myTable').DataTable();
                var table = $('#example').DataTable({
                    "columnDefs": [{
                        "visible": false,
                        "targets": 2
                    }],
                    "order": [
                        [2, 'asc']
                    ],
                    "displayLength": 25,
                    "drawCallback": function (settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: 'current'
                        }).nodes();
                        var last = null;
                        api.column(2, {
                            page: 'current'
                        }).data().each(function (group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                                last = group;
                            }
                        });
                    }
                });
                // Order by the grouping
                $('#example tbody').on('click', 'tr.group', function () {
                    var currentOrder = table.order()[0];
                    if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                        table.order([2, 'desc']).draw();
                    } else {
                        table.order([2, 'asc']).draw();
                    }
                });
                // responsive table
                $('#config-table').DataTable({
                    responsive: true
                });
                $('#example23').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });
                $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');
            });

        </script>
    @endsection


@endsection