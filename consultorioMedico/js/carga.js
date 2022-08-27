$(document).ready(function () {
    cargaRoles();

});//(document).ready ==============================

function cargaRoles() { //Inicio funcion carga roles
    try {
        $.ajax({
            url: '../gets/getRoles.php'
        }).done(function (data) {
                LlenaRolesJson(data);
            });
    } catch (err) {
        alert(err);
    } 
}//Fin cargaRoles ==============================================
function LlenaRolesJson(TextoJSON) { //Inicio funcion llenar roles
    var elValor;
    var elHTML;
    var ObjetoJSON = JSON.parse(TextoJSON);
    for (i = 0; i < ObjetoJSON.length; i++) {
        elValor = ObjetoJSON[i].idtipoUsuario;
        elHTML = ObjetoJSON[i].tipoDeUsuario;
        $('#rolTrabajo').append($('<option></option>').val(elValor).html(elHTML));
    }
}//Fin LlenaDiasJson ================================================
