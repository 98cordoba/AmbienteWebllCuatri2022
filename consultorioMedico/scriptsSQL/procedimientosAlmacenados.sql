DELIMITER $$
/* ********************________SELECTS___________******************** */
/*          GET ROLES           */
DROP PROCEDURE IF EXISTS `consultoriomedico`.`spGetRoles`$$
CREATE PROCEDURE `consultoriomedico`.`spGetRoles`()
    BEGIN
	SELECT idtipoUsuario, tipoDeUsuario FROM tipousuario;	
END$$
/*          GET USUARIOS        */
DROP PROCEDURE IF EXISTS `consultoriomedico`.`spGetUsuarios`$$
CREATE PROCEDURE `consultoriomedico`.`spGetUsuarios`()
    BEGIN
	SELECT idUsuarios, nombreUsuario, tipoUsuario FROM usuarios;	
END$$
/*          GET DOCTORES            */
DROP PROCEDURE IF EXISTS `consultoriomedico`.`spGetDoctores`$$
CREATE PROCEDURE `consultoriomedico`.`spGetDoctores`()
    BEGIN
	SELECT idDoctor, nombreDoctor, apellidosDoctor FROM doctor;	
END$$
/*          GET PACIENTES         */
DROP PROCEDURE IF EXISTS `consultoriomedico`.`spGetPacientes`$$
CREATE PROCEDURE `consultoriomedico`.`spGetPacientes`()
    BEGIN
	SELECT idPaciente, nombrePaciente, apellidosPaciente FROM pacientes;	
END$$
/*          GET CITAS         */
DROP PROCEDURE IF EXISTS `consultoriomedico`.`spGetCitas`$$
CREATE PROCEDURE `consultoriomedico`.`spGetCitas`()
    BEGIN
	SELECT idCita, fechaCita FROM cita;	
END$$
/*          GET EXPEDIENTES         */
DROP PROCEDURE IF EXISTS `consultoriomedico`.`spGetExpedientes`$$
CREATE PROCEDURE `consultoriomedico`.`spGetExpedientes`()
    BEGIN
	SELECT idExpediente, exPaciente, apellidosDoctor FROM expediente;	
END$$
/* ********************________INSERTS___________******************** */
            /* ROLES */
DROP PROCEDURE IF EXISTS `consultoriomedico`.`spInsertarRol`$$
CREATE PROCEDURE `consultoriomedico`.`spInsertarRol`(in pnombreRol varchar(45))
    BEGIN
	INSERT INTO roles(nombreRol) VALUES (pnombreRol);
END$$
            /* USUARIOS */
DROP PROCEDURE IF EXISTS `consultoriomedico`.`spInsertarUsuario`$$
CREATE PROCEDURE `consultoriomedico`.`spInsertarUsuario`(in pnombreUsuario varchar(45), in ppasswordUsuario varchar(45), in pRol int)
    BEGIN
	INSERT INTO usuarios (nombreUsuario,passwordUsuario,rol) VALUES (pnombreUsuario, ppasswordUsuario , pRol);
END$$
            /* EMPLEADOS */
DROP PROCEDURE IF EXISTS `consultoriomedico`.`spInsertarEmpleado`$$
CREATE PROCEDURE `consultoriomedico`.`spInsertarEmpleado`(in pnombreEmpleado varchar(45), in papellidosEmpleado varchar(45), in pcedulaEmpleado varchar(20), in ptelefonoEmpleado varchar(20) ,in pcorreoEmpleado varchar(45),  in pespecialidad varchar(45), in psalario int)
    BEGIN
	INSERT INTO empleados(nombreEmpleado,apellidosEmpleado,cedulaEmpleado,telefonoEmpleado,correoEmpleado,especialidad,salario)VALUES(pnombreEmpleado,papellidosEmpleado,pcedulaEmpleado,ptelefonoEmpleado,pcorreoEmpleado,pespecialidad,psalario);
END$$
            /* PACIENTES */
DROP PROCEDURE IF EXISTS `consultoriomedico`.`spInsertarPaciente`$$
CREATE PROCEDURE `consultoriomedico`.`spInsertarPaciente`(in pnombrePaciente varchar(45), in papellidosPaciente varchar(45), in pcedulaPaciente varchar(20), in pfechaNacimiento varchar(10), in ptelefonoPaciente varchar(20), in pcorreoPaciente varchar(45),in pexpediente int)
    BEGIN
	INSERT INTO pacientes(nombrePaciente,apellidosPaciente,cedulaPaciente,fechaNacimiento,telefonoPaciente,correoPaciente,expediente)VALUES(pnombrePaciente, papellidosPaciente , pcedulaPaciente ,pfechaNacimiento , ptelefonoPaciente , pcorreoPaciente, pexpediente);
END$$
            /* CITAS */
DROP PROCEDURE IF EXISTS `consultoriomedico`.`spInsertarCita`$$
CREATE PROCEDURE `consultoriomedico`.`spInsertarCita`(in pfechaCita varchar(10), in pdescripcion varchar(45), in pdoctorAsignado int, in pcidPaciente varchar(10))
    BEGIN
	INSERT INTO cita(fechaCita,descripcion,doctorAsignado,cidPaciente)VALUES(pfechaCita,pdescripcion,pdoctorAsignado,pcidPaciente);
END$$
/* ********************________UPDATES___________********************   */
            /* ROLES */
DROP PROCEDURE IF EXISTS `consultoriomedico`.`spActualizaRol`$$
CREATE PROCEDURE `consultoriomedico`.`spActualizaRol`(in ptipoDeUsuario varchar(45),in pidtipoUsuario int)
    BEGIN
	update tipousuario 
            set tipoDeUsuario    = ptipoDeUsuario
    where idtipoUsuario = pidtipoUsuario;
END$$
            /* USUARIOS */
DROP PROCEDURE IF EXISTS `consultoriomedico`.`spActualizaUsuario`$$
CREATE PROCEDURE `consultoriomedico`.`spActualizaUsuario`(in pnombreUsuario varchar(45), in ppasswordUsuario VARCHAR(45), in pRol int, in pidUsuario int)
    BEGIN
	update usuarios 
            set nombreUsuario    = pnombreUsuario, 
                passwordUsuario  = ppasswordUsuario,
                rol      = pRol
    where idUsuario = pidUsuario;
END$$
            /* CONTRASEÑA */
DROP PROCEDURE IF EXISTS `consultoriomedico`.`spActualizaContraseña`$$
CREATE PROCEDURE `consultoriomedico`.`spActualizaContraseña`(in ppasswordUsuario VARCHAR(45), in pidUsuario int)
    BEGIN
	update usuarios 
            set passwordUsuario = ppasswordUsuario
    where idUsuario = pidUsuario;
END$$
            /* PACIENTES */
DROP PROCEDURE IF EXISTS `consultoriomedico`.`spActualizaPaciente`$$
CREATE PROCEDURE `consultoriomedico`.`spActualizaPaciente`(in pnombrePaciente varchar(45), in papellidosPaciente VARCHAR(45), in pcedulaPaciente int , in pfechaNacimiento VARCHAR(10),in ptelefonoPaciente varchar(10),in pcorreoPaciente varchar(45) ,in pidPaciente int)
    BEGIN
	update pacientes 
            set nombrePaciente       = pnombrePaciente, 
                apellidosPaciente    = papellidosPaciente,
                cedulaPaciente       = pcedulaPaciente,
                fechaNacimiento      = pfechaNacimiento,
                telefonoPaciente     = ptelefonoPaciente,
                correoPaciente       = pcorreoPaciente
    where idPaciente = pidPaciente;
END$$
            /* EMPLEADOS */
DROP PROCEDURE IF EXISTS `consultoriomedico`.`spActualizaEmpleado`$$
CREATE PROCEDURE `consultoriomedico`.`spActualizaEmpleado`(in pnombreEmpleado varchar(45), in papellidosEmpleado VARCHAR(45), in pcedulaEmpleado varchar(20) ,in ptelefonoEmpleado varchar(20), in pcorreoEmpleado VARCHAR(45), in pespecialidad varchar(45) ,in psalario int,in pusuario int,in pidEmpleado int)
    BEGIN
	update empleados 
            set nombreEmpleado     = pnombreEmpleado, 
                apellidosEmpleado  = papellidosEmpleado,
                cedulaEmpleado     = pcedulaEmpleado,
                telefonoEmpleado   = ptelefonoEmpleado,
                correoEmpleado     = pcorreoEmpleado,
                especialidad       = pespecialidad,
                salario            = psalario,
                usuario            = pusuario
    where idEmpleado = pidEmpleado;
END$$
            /* CITAS */
DROP PROCEDURE IF EXISTS `consultoriomedico`.`spActualizaCita`$$
CREATE PROCEDURE `consultoriomedico`.`spActualizaCita`(in pfechaCita varchar(10), in pdescripcion VARCHAR(45), in pdoctorAsignado int,in pidCita int)
    BEGIN
	update cita 
            set fechaCita        = pfechaCita, 
                descripcion      = pdescripcion,
                doctorAsignado   = pdoctorAsignado
    where idCita = pidCita;
END$$
/* ********************________DELETES___________******************** */
            /* Rol */
DROP PROCEDURE IF EXISTS `consultoriomedico`.`spEliminaRol`$$
CREATE PROCEDURE `consultoriomedico`.`spEliminaRol`(in pidRol int)
    BEGIN
	delete from roles where idRol = pidRol;
END$$
            /* USARIOS */
DROP PROCEDURE IF EXISTS `consultoriomedico`.`spEliminaUsuario`$$
CREATE PROCEDURE `consultoriomedico`.`spEliminaUsuario`(in pidUsuario int)
    BEGIN
	delete from usuarios where idUsuarios = pidUsuario;
END$$
            /* PACIENTES */
DROP PROCEDURE IF EXISTS `consultoriomedico`.`spEliminaPaciente`$$
CREATE PROCEDURE `consultoriomedico`.`spEliminaPaciente`(in pidPaciente int)
    BEGIN
	delete from pacientes where idPaciente = pidPaciente;
END$$
            /* CITAS */
DROP PROCEDURE IF EXISTS `consultoriomedico`.`spEliminaCita`$$
CREATE PROCEDURE `consultoriomedico`.`spEliminaCita`(in pidCita int)
    BEGIN
	delete from cita where idCita = pidCita;
END$$
            /* EMPLEADOS */
DROP PROCEDURE IF EXISTS `consultoriomedico`.`spEliminaEmpleado`$$
CREATE PROCEDURE `consultoriomedico`.`spEliminaEmpleado`(in pidEmpleado int)
    BEGIN
	delete from empleados where idEmpleado = pidEmpleado;
END$$
DELIMITER ;  