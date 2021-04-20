<div id="verticalcenter" class="modal" tabindex="-1" role="dialog" aria-labelledby="vcenter" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="vcenter">Service</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
             <div class="row">
                 <div class="col-lg-12">
                     <div class="form-group">
                         <label for="">Entreprise</label>
                         <select name="" id="entreprise" class="form-control">
                             <option  selected disabled="">Choisir l'entreprise</option>
                             @foreach($entreprises as $entreprise)
                                 <option value="{{$entreprise->id}}">{{$entreprise->name}}</option>
                             @endforeach
                         </select>
                     </div>
                 </div>
                 <div class="col-lg-12">
                     <div class="form-group">
                         <label for="">Service (Département)</label>
                         <input type="text" class="form-control" placeholder="Nom" id="departement">
                     </div>
                 </div>
             </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Fermer</button>
            <button type="button" class="btn btn-success waves-effect" id="addService" onclick="addService()">Valider</button>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->