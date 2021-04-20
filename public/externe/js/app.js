function addAppointment(){
     var user = $('#patient').val()
     var doctor = $('#doctor').val()
     var date = $('#ap-date').val()
     var time = $('#ap-time').val()
    if (user == "" || doctor == "" || date == "" || time == ""){
        $('#resultbook').html(` <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>    Veuillez remplir tous les champs</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>`)
    } else{
         $.ajax({
             url : "/apointment/add",
             type : "post",
             data : {
                 client_id : user,
                 doctor_id : doctor,
                 date : date,
                 time : time
             },
             success:function (msg) {
                 if (msg == "true"){
                    $('#resultbook').html(` <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Ajouter avec succes</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>`)
                     $('#departement').val("")
                     $('#patient').val("")
                     $('#doctor').val("")
                     $('#ap-date').val("")
                     $('#ap-time').val("")
                 } else{
                     $('#resultbook').html('<p class="text-danger">Une erreur interne est survenue</p>')
                 }
             },
             error:function () {
                 
             }
         })
    }
}
function getDepartement(v){
    var value = v.value
    $('#departement').html("")
    $.ajax({
        url : "/apointment/departement",
        type : "get",
        data : {
            value : value
        },
        success:function (msg) {
            if (msg != "false"){
               var content = JSON.parse(msg)
                var option = ""
                for (var k = 0; k < content.length ; k++){
                   option += `<option value='${content[k].id}'>${content[k].poste}</option>`
                }
                $('#departement').html(option)
            } else{
         $('#departement').append('<option disabled>Vide</option>')
            }
        },
    })
}
function getDoctors(v){
    var value = v.value
    $('#doctor').html('')
    $.ajax({
        url : "/apointment/doctors",
        type : "get",
        data : {
            value : value,
        },
        success:function (msg) {
            if (msg != "false"){
                var content = JSON.parse(msg)
                var option = ""
                for (var k = 0; k < content.length ; k++){
                    option += `<option value='${content[k].id}'>${content[k].name}</option>`
                }
                $('#doctor').html(option)
            } else{
                $('#doctor').append('<option disabled>Vide</option>')
            }
        }
    })
}
function updateMypatientInfo() {
    var firstname  = $('#firstname').val()
    var lastname  = $('#lastname').val()
    var email  = $('#email').val()
    $('#updateResult').html("")

    if (firstname == "" || lastname == "" || email == ""){
     $('#updateResult').html(`
                          
                                     <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>    Veuillez remplir tous les champs</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
`)
    } else{
        $.ajax({
            url : "/patient/profil/update",
            type : "get",
            data : {
                name : firstname+" "+lastname,
                email : email
            },
            success:function (msg) {
                if (msg == "true"){
                    $('#updateResult').html(`
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>   Modifier avec succes</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                    `)
                }
                else{
                    $('#updateResult').html(`
                       <div class="alert alert-dismissible alert-danger">
                                  Aucune modification apporté
                                </div>
                    `)
                }

                setTimeout(()=>{
                    $('#updateResult').html("")
                },5000)
            }
        })

    }
}

function setPicture(input,id){
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#'+id).attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
        var formData = new FormData()
        formData.append('avatar',input.files[0])
        $.ajax({
            url: "/patient/update/profil",
            type: 'POST',
            data: formData,
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function () {
                $('#updateResultupdate').html(`
                    
                                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>  Phot de profil mise a jour avec succes</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
`)
                setTimeout(() => {
                    window.location.reload()
                },3000)
            }


        })

    }
}
