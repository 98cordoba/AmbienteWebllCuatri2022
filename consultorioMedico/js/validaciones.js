function validarIngreso() {
    var retorno = false;
    try {
        var user = document.getElementById('inputUsuario').value;
        var passw = document.getElementById('inputPassword').value;
        if ((user == null || user.length == 0 || /^\s+$/.test(user))||(passw == null || passw.length == 0 || /^\s+$/.test(passw))) {           
            alert("Este formulario cuenta con campos obligatorios \n Por favor verifique sus datos");
            location.reload();
            return retorno;  
        }else{
            retorno = true;
        }
    } catch (error) {
        retorno = false;
    }
    return retorno;
}