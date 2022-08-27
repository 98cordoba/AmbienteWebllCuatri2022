function validarIngreso() {
    var retorno = false;
    try {
        var user = document.getElementById('inputUsuario').value;
        var passw = document.getElementById('inputPassword').value;
        if ((user == null || user.length == 0 || /^\s+$/.test(user))||(passw == null || passw.length == 0 || /^\s+$/.test(passw))) {       
            alert("Este formulario cuenta con campos obligatorios \n Por favor verifique sus datos");                                      
            return retorno;  
        }else{
            retorno = true;
        }
    } catch (error) {
        retorno = false;
    }
    return retorno;
}


// /^\s+$/ busca si el string esta en blanco

function validarUsuario() {
    var retorno = false;
    try {
        var nombre = document.getElementById('inputNombre').value;
        var cedula = document.getElementById('inputCedula').value;
        var telefono = document.getElementById('inputTelefono').value;

        if ((nombre == null || nombre.length == 1 || /^\s+$/.test(nombre))) {           
            alert("Formato de nombre y apellidos del paciente incorrectos. \n Por favor verifique sus datos e intente nuevamente.");
            return retorno;
        }else if (cedula == null || cedula.length != 9) {           
                alert("La cedula del paciente debe ser de 9 digitos. \n Por favor verifique sus datos e intente nuevamente.");
                return retorno;
            }else if (telefono == null || telefono.length != 8) {           
                alert("Número de teléfono debe ser de 8 digitos. \n Por favor verifique sus datos e intente nuevamente.");
                return retorno;
            }
            else{
                retorno = true;
            }
    } catch (error) {
        retorno = false;
    }
    return retorno;
}

function validarEmpleado() {
    var retorno = false;
    try {
        var nombre = document.getElementById('inputNombre').value;
        var cedula = document.getElementById('inputCedula').value;
        var telefono = document.getElementById('inputTelefono').value;

        if ((nombre == null || nombre.length == 1 || /^\s+$/.test(nombre))) {           
            alert("Formato de nombre y apellidos del paciente incorrectos. \n Por favor verifique sus datos e intente nuevamente.");
            return retorno;
        }else if (cedula == null || cedula.length != 9) {           
                alert("La cedula del paciente debe ser de 9 digitos. \n Por favor verifique sus datos e intente nuevamente.");
                return retorno;
            }else if (telefono == null || telefono.length != 8) {           
                alert("Número de teléfono debe ser de 8 digitos. \n Por favor verifique sus datos e intente nuevamente.");
                return retorno;
            }
            else{
                retorno = true;
            }
    } catch (error) {
        retorno = false;
    }
    return retorno;
}