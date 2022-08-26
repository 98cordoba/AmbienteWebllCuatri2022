$(document).ready(function () {
    //$("#pnlMensaje").slideToggle("slow");
    cargaRoles();
    //cargaProfesores();
    /*$("#btEnviar").click(function () {
        ingresaTutoria($("#nombreAlumno").val(), $("#idProfesor").val(), $("#idDia").val(), 
        $("input[name='hora']:checked").val(), $("#asunto").val());
    });
    $("#btRestablecer").click(function () {
        LimpiaCampos();
    });*/
});//(document).ready ==============================

function cargaRoles() {
    try {
        $.ajax({
            url: '../gets/getRoles.php'
        })
            .done(function (data) {
                LlenaRolesJson(data);
            });
    } catch (err) {
        alert(err);
    }
}//Fin cargaRoles ==============================================
/*function cargaProfesores() {
    try {
        $.ajax({
            url: 'getProfesores.php'
        })
            .done(function (data) {
                LlenaProfesorJson(data);
            });
    } catch (err) {
        alert(err);
    }
}//Fin cargaProfesores ==============================================
*//*
function ingresaTutoria(pnombreAlumno, pidProfesor, pidDia, pHora, pAsunto) {
    try {
        $.ajax(
            {
                data: {
                    nombreAlumno: pnombreAlumno,
                    idProfesor: pidProfesor,
                    idDia: pidDia,
                    hora: pHora,
                    asunto: pAsunto,
                },
                url: 'insertaTutoria.php',
                type: 'POST',
                dataType: 'json',
                // beforeSend: function () 
                //  {
                //     $("#pnlInfo").fadeTo("slow");
                //     $("#pnlMensaje").fadeTo("slow");
                //  },
                success: function (r) {
                    InsercionTutoriaExitosa(r);
                },
                error: function (r) {
                    InsercionTutoriaFallida(r);
                }
            });
    } catch (err) {
        alert(err);
    }
}//Fin ingresaTutoria ================================================
*/
function LlenaRolesJson(TextoJSON) {
    var elValor;
    var elHTML;
    var ObjetoJSON = JSON.parse(TextoJSON);
    for (i = 0; i < ObjetoJSON.length; i++) {
        elValor = ObjetoJSON[i].id;
        elHTML = ObjetoJSON[i].dia;
        $('#idtipoUsuario').append($('<option></option>').val(elValor).html(elHTML));
    }
}//Fin LlenaDiasJson ================================================
/*
function LlenaProfesorJson(TextoJSON) {
    var elValor;
    var elHTML;
    var ObjetoJSON = JSON.parse(TextoJSON);
    for (i = 0; i < ObjetoJSON.length; i++) {
        elValor = ObjetoJSON[i].id;
        elHTML = ObjetoJSON[i].Nombre;
        $('#idProfesor').append($('<option></option>').val(elValor).html(elHTML));
    }
}//Fin LlenaProfesorJson ================================================

function InsercionTutoriaExitosa(ObjetoJSON) {

    $("#pnlInfo").dialog();
    $("#blInfo").html('<p>' + ObjetoJSON.mensaje + '</p>');
    LimpiaCampos();
}//Fin InsercionTutoriaExitosa ================================================

function LimpiaCampos() {
    $('#nombreAlumno').val('');
    $('#asunto').val('');
    $("#idProfesor").val("1");
    $("#idDia").val("1");
    $("input[name=hora][value='10']").prop("checked",true);
    //$('input[name="hora"]').attr('checked', false);
}//Fin LimpiaCampos ================================================

function InsercionTutoriaFallida(ObjetoJSON) {
    $("#pnlMensaje").dialog();
    $("#pnlMensaje").html('<p>Ocurrio un error en el servidor ..</p>' + ObjetoJSON.mensaje);
}//Fin InsercionTutoriaFallida ================================================
*/
