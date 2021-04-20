paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
        sandbox: 'AWaN9XHBZ5U92A94cM97N1HiUZZ1pie6EHuSuMhMdNE9pwBZY8r5wZBdD8LBqXq14ZNbp8qViH0-C-6K',
        production: 'demo_production_client_id'
    },
    // Customize button (optional)
    locale: 'fr_FR',
    style: {
        size: 'medium',
        color: 'blue',
        shape: 'pill',
    },

    // Enable Pay Now checkout flow (optional)
    commit: true,

    // Set up a payment
    payment: function(data, actions) {
        return actions.payment.create({
            transactions: [{
                amount: {
                    total: '20',
                    currency: 'EUR'
                }
            }]
        });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
        return actions.payment.execute().then(function() {
             $.ajax({
                 url : '/setting/premium',
                 type : 'get',
                 success:function (msg) {
                     notifMessage('success','Succes','Souscription reussit avec succes')
                     setTimeout(()=>{
                         window.location.reload()
                     },3000)
                 }
             })
        });
    }
}, '#paypal-button');


function notifMessage(type,header,text){
    if (type == "success"){
        $.toast({
            heading: header,
            text: text,
            position: 'top-right',
            loaderBg:'#41dd76',
            icon: 'success',
            hideAfter: 3500,
            stack: 6
        });
    }
    if (type == "info"){
        $.toast({
            heading: header,
            text: text,
            position: 'top-right',
            loaderBg:'#4385cf',
            icon: 'info',
            hideAfter: 3500,
            stack: 6
        });
    }
    if (type == "warning"){
        $.toast({
            heading: header,
            text: text,
            position: 'top-right',
            loaderBg:'#ca9b0f',
            icon: 'warning',
            hideAfter: 3500,
            stack: 6
        });
    }
    if (type == "danger"){
        $.toast({
            heading: header,
            text: text,
            position: 'top-right',
            loaderBg:'#d2283a',
            icon: 'danger',
            hideAfter: 3500,
            stack: 6
        });
    }
}

function ActionApointment(id,type){
    var text = ""
    if (parseInt(type) == 2) {
     text = "Valider le rendez-vous!"
    }
    if (parseInt(type) == 3) {
        text = "Terminer le rendez-vous!"
    }
    if (parseInt(type) == 4) {
        text = "Annuler le rendez-vous!"
    }

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'mr-2 btn btn-danger'
        },
        buttonsStyling: false,
    })

    swalWithBootstrapButtons.fire({
        title: 'Êtes vous sûre?',
        text: text,
        type: 'success',
        showCancelButton: true,
        confirmButtonText: 'valider!',
        cancelButtonText: 'Annulé!',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {

            $.ajax({
                url : '/medecine/active/apointment/'+type+"/"+id,
                type : "get",
                success:function (msg) {
                    if (msg == 'true'){
                        swalWithBootstrapButtons.fire(
                            'Reussit!',
                            'Operation éffectué avec success',
                            'success'
                        )
                        setTimeout(()=>{
                            window.location.reload()
                        },3000)
                    } else{

                    }
                }
            })


        } else if (
            // Read more about handling dismissals
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Annulé',
                'Operation annulé',
                'error'
            )
        }
    })
}

function actionMedecine(id,type,category){
    var url = ""

    if (category == "service"){
        url = "/admin/service/action/"
    } else{
        url = "/admin/entreprise/action/"
    }

    var text = ""
    if (parseInt(type) == 1) {
     text = "Activer "+category+" !"
    }
    if (parseInt(type) == 2) {
        text = "Désactiver "+category+" !"
    }
    if (parseInt(type) == 3) {
        text = "Supprimer "+category+" !"
    }

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'mr-2 btn btn-danger'
        },
        buttonsStyling: false,
    })

    swalWithBootstrapButtons.fire({
        title: 'Êtes vous sûre?',
        text: text,
        type: 'success',
        showCancelButton: true,
        confirmButtonText: 'valider!',
        cancelButtonText: 'Annulé!',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {

            $.ajax({
                url :url+type+"/"+id,
                type : "get",
                success:function (msg) {
                    if (msg == 'true'){
                        swalWithBootstrapButtons.fire(
                            'Reussit!',
                            'Operation éffectué avec success',
                            'success'
                        )
                        setTimeout(()=>{
                            window.location.reload()
                        },3000)
                    } else{

                    }
                }
            })


        } else if (
            // Read more about handling dismissals
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Annulé',
                'Operation annulé',
                'error'
            )
        }
    })
}

function addService(){
    var entreprise = $('#entreprise').val()
    var departement = $('#departement').val()
    if (entreprise == "" || departement == "" ){
       notifMessage('warning','Erreur','Veuillez remplir tous les champs')
    } else{
        document.getElementById('addService').disabled = true
        $.ajax({
            url : "/service/add",
            type : "post",
            data : {
                entreprise_id : entreprise,
                poste : departement
            },
            success:function (msg) {
                document.getElementById('addService').disabled = false
                if (msg == "true"){
                    notifMessage('success','Succes','Ajouter avec succes')
                    $('#departement').val("")
                    $('#entreprise').val("")
                    setTimeout(()=> {
                        window.location.reload()
                    },3000)
                }
                else if (msg == "exist"){
                    notifMessage('warning','Error',"Ce département existe déjà")
                } else{
                    notifMessage('danger','Error',"Impossible d'ajouter ce service")
                }
            },
            error:function () {

            }
        })
    }
}

function addEntreprise(){
    var entreprise = $('#entreprise').val()
    if (entreprise == ""){
        notifMessage('warning','Erreur','Veuillez remplir tous les champs')
    } else{
        document.getElementById('addEntreprise').disabled = true
        $.ajax({
            url : "/entreprise/add",
            type : "get",
            data : {
                name : entreprise
            },
            success:function (msg) {
                document.getElementById('addEntreprise').disabled = false
                if (msg == "true"){
                    notifMessage('success','Succes','Ajouter avec succes')
                    $('#entreprise').val("")
                    setTimeout(()=> {
                        window.location.reload()
                    },3000)
                }
                else if (msg == "exist"){
                    notifMessage('warning','Error',"Ce département existe déjà")
                } else{
                    notifMessage('danger','Error',"Impossible d'ajouter cet entreprise")
                }
            },
            error:function () {

            }
        })
    }
}


function setPictureUser(input,id){
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#'+id).attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
        var formData = new FormData()
        formData.append('avatar',input.files[0])
        $.ajax({
            url: "/admin/update/profil",
            type: 'POST',
            data: formData,
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function () {
                notifMessage('success','Succes',"Profil modifier avec succes")
                setTimeout(() => {
                    window.location.reload()
                },3000)
            }
        })

    }
}