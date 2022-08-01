function validarIngreso() {
    var retorno = false;
    try {
        var user = document.getElementById('inputUsuario').value;
        var passw = document.getElementById('inputPassword').value;
        if (user == null || user.length == 0 || /^\s+$/.test(user)) {
            
            alert("Usuario incompleto");
            return retorno;
        }
        if (passw == null || passw.length == 0 || /^\s+$/.test(passw)) {
            
            alert("Contraseña incompleto");
            return retorno;
        }
        
    } catch (error) {
        retorno = false;
    }
    return retorno;
}