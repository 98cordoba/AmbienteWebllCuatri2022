$(document).ready(function () {
    cargaRoles();

});//(document).ready ==============================

function cargaRoles() { //Inicio funcion carga roles
    try {
        $.ajax({
            url: '../gets/getRoles.php'
        }).done(function (data) {
                LlenaUsersJson(data);
            });
    } catch (err) {
        alert(err);
    } 
}//Fin cargaRoles ==============================================
function LlenaUsersJson(TextoJSON) { //Inicio funcion llenar roles
    var elValor;
    var elHTML;
    var ObjetoJSON = JSON.parse(TextoJSON); 
    for (i = 0; i < ObjetoJSON.length; i++) {
        elValor = ObjetoJSON[i].id;
        elHTML = ObjetoJSON[i].nombre;
        $('#rolTrabajo').append($('<option></option>').val(elValor).html(elHTML));
    }
}//Fin LlenaDiasJson ================================================


function cargaUsers() { //Inicio funcion carga roles
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
        elValor = ObjetoJSON[i].id;
        elHTML = ObjetoJSON[i].nombre;
        $('#rolTrabajo').append($('<option></option>').val(elValor).html(elHTML));
    }
}//Fin LlenaDiasJson ================================================


function cargaUsers() { //Inicio funcion carga roles
    try {
        $.ajax({
            url: '../gets/getUsers.php'
        }).done(function (data) {
                LlenaUsersJson(data);
            });
    } catch (err) {
        alert(err);
    } 
}//Fin cargaRoles ==============================================
function LlenaUsersJson(TextoJSON) { //Inicio funcion llenar roles
    var elValor;
    var elHTML;
    var ObjetoJSON = JSON.parse(TextoJSON); 
    for (i = 0; i < ObjetoJSON.length; i++) {
        elValor = ObjetoJSON[i].id;
        elHTML = ObjetoJSON[i].nombre;
        $('#rolTrabajo').append($('<option></option>').val(elValor).html(elHTML));
    }
}//Fin LlenaDiasJson ================================================



function cargaCitas() { //Inicio funcion carga roles
    try {
        $.ajax({
            url: '../gets/getCitas.php'
        }).done(function (data) {
                LlenaCitasJson(data);
            });
    } catch (err) {
        alert(err);
    } 
}//Fin cargaRoles ==============================================
function LlenaCitasJson(TextoJSON) { //Inicio funcion llenar roles
    var elValor;
    var elHTML;
    var ObjetoJSON = JSON.parse(TextoJSON); 
    for (i = 0; i < ObjetoJSON.length; i++) {
        elValor = ObjetoJSON[i].id;
        elHTML = ObjetoJSON[i].nombre;
        $('#rolTrabajo').append($('<option></option>').val(elValor).html(elHTML));
    }
}//Fin LlenaDiasJson ================================================


function cargaCitas() { //Inicio funcion carga roles
    try {
        $.ajax({
            url: '../gets/getCitas.php'
        }).done(function (data) {
                LlenaCitasJson(data);
            });
    } catch (err) {
        alert(err);
    } 
}//Fin cargaRoles ==============================================
function LlenaCitasJson(TextoJSON) { //Inicio funcion llenar roles
    var elValor;
    var elHTML;
    var ObjetoJSON = JSON.parse(TextoJSON); 
    for (i = 0; i < ObjetoJSON.length; i++) {
        elValor = ObjetoJSON[i].id;
        elHTML = ObjetoJSON[i].nombre;
        $('#rolTrabajo').append($('<option></option>').val(elValor).html(elHTML));
    }
}//Fin LlenaDiasJson ================================================