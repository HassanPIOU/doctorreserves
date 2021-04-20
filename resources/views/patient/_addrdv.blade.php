<div class="modal fade" id="view-invoice" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-bottom p-3">
                <h5 class="modal-title" id="exampleModalLabel">Prendre un rendez-vous</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-3 pt-4">
                <div class="pt-4 border-top">
                    <div >
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3" style="display: none;">
                                    <label class="form-label">Patient Name <span class="text-danger">*</span></label>
                                    <input name="name" id="patient" type="text" value="{{auth()->user()->id}}" class="form-control">
                                </div>
                            </div><!--end col-->

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Hopital</label>
                                    <select class="form-control department-name select2input" onchange="getDepartement(this)">
                                        <option  selected disabled=""></option>
                                        @foreach($hospital as $hosp)
                                        <option value="{{$hosp->id}}">{{$hosp->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!--end col-->

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Département</label>
                                    <select class="form-control doctor-name select2input" id="departement" onchange="getDoctors(this)">
                                    </select>
                                </div>
                            </div><!--end col-->

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Doctor</label>
                                    <select class="form-control doctor-name select2input" id="doctor">
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label"> Date : </label>
                                    <input name="date" type="date" class="flatpickr flatpickr-input form-control" id="ap-date">
                                </div>
                            </div><!--end col-->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label"> Heure : </label>
                                    <input name="date" type="time"  class="flatpickr flatpickr-input form-control" id="ap-time">
                                </div>
                            </div><!--end col-->



                            <div class="col-lg-3 offset-lg-9">
                                <div class="d-grid">
                                    <button  onclick="addAppointment()" class="btn btn-primary">Definir</button>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-12">
                                <div id="resultbook"></div>
                            </div>
                        </div><!--end row-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>