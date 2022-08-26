DELIMITER $$
DROP PROCEDURE IF EXISTS `consultoriomedico`.`spGetRoles`$$
CREATE PROCEDURE `consultoriomedico`.`spGetRoles`()
    BEGIN
	SELECT idtipoUsuario, tipoDeUsuario FROM tipousuario;	
END$$
/*          */
DROP PROCEDURE IF EXISTS `consultoriomedico`.`spGetDoctores`$$
CREATE PROCEDURE `consultoriomedico`.`spGetDoctores`()
    BEGIN
	SELECT idDoctor, nombreDoctor, apellidosDoctor FROM doctor;	
END$$
/* ********************________INSERTS___________******************** */
/* ROLES */
DROP PROCEDURE IF EXISTS `consultoriomedico`.`spInsertartipousuario`$$
CREATE PROCEDURE `consultoriomedico`.`spInsertartipousuario`(in PtipoDeUsuario varchar(45))
    BEGIN
	INSERT INTO tipousuario (PtipoDeUsuario);
END$$
/* USUARIOS */
DROP PROCEDURE IF EXISTS `consultoriomedico`.`spInsertarUsuario`$$
CREATE PROCEDURE `consultoriomedico`.`spInsertarUsuario`(in pnombreUsuario varchar(45), in ppasswordUsuario varchar(45), in tipoUsuario int)
    BEGIN
	INSERT INTO usuarios (nombreUsuario,passwordUsuario,tipoUsuario) VALUES (pnombreUsuario, ppasswordUsuario , tipoUsuario);
END$$
/* DOCTORES */
DROP PROCEDURE IF EXISTS `consultoriomedico`.`spInsertarDoctor`$$
CREATE PROCEDURE `consultoriomedico`.`spInsertarDoctor`(in pnombreDoctor varchar(45), in papellidosDoctor varchar(45), in pcedulaDoctor int, in ptelefonoDoctor varchar(10) ,in pcorreoDoctor varchar(45),  in pespecialidad varchar(45), in ptipoUsuario int)
    BEGIN
	INSERT INTO doctor(nombreDoctor,apellidosDoctor,cedulaDoctor,telefonoDoctor,correoDoctor,especialidad,tipoUsuario)VALUES(pnombreDoctor,papellidosDoctor,pcedulaDoctor,ptelefonoDoctor,pcorreoDoctor,pespecialidad,ptipoUsuario);
END$$
/* PACIENTES */
DROP PROCEDURE IF EXISTS `consultoriomedico`.`spInsertarPaciente`$$
CREATE PROCEDURE `consultoriomedico`.`spInsertarPaciente`(in pnombrePaciente varchar(45), in papellidosPaciente varchar(45), in pcedulaPaciente int, in pfechaNacimiento varchar(10), in ptelefonoPaciente varchar(10),  in pcorreoPaciente varchar(45))
    BEGIN
	INSERT INTO pacientes(nombrePaciente,apellidosPaciente,cedulaPaciente,fechaNacimiento,telefonoPaciente,correoPaciente)VALUES(pnombrePaciente, papellidosPaciente , pcedulaPaciente ,pfechaNacimiento , ptelefonoPaciente , pcorreoPaciente);
END$$
/* CITAS */
DROP PROCEDURE IF EXISTS `consultoriomedico`.`spInsertarCita`$$
CREATE PROCEDURE `consultoriomedico`.`spInsertarCita`(in pfechaCita varchar(10), in pdescripcion varchar(45), in pdoctorAsignado int, in pcidPaciente varchar(10))
    BEGIN
	INSERT INTO cita(fechaCita,descripcion,doctorAsignado,cidPaciente)VALUES(pfechaCita,pdescripcion,pdoctorAsignado,pcidPaciente);
END$$
/* EXPEDIENTES */
DROP PROCEDURE IF EXISTS `consultoriomedico`.`spInsertarExpediente`$$
CREATE PROCEDURE `consultoriomedico`.`spInsertarExpediente`(in pexPaciente int,  in pexDoctor int,  in pexConsulta int)
    BEGIN
	INSERT INTO expediente (exPaciente,exDoctor,exConsulta)VALUES(pexPaciente,pexDoctor,pexConsulta);
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
CREATE PROCEDURE `consultoriomedico`.`spActualizaUsuario`(in pnombreUsuario varchar(45), in ppasswordUsuario VARCHAR(45), in ptipoUsuario int, in pidUsuarios int)
    BEGIN
	update usuarios 
            set nombreUsuario    = pnombreUsuario, 
                passwordUsuario  = ppasswordUsuario,
                tipoUsuario      = ptipoUsuario
    where idUsuarios = pidUsuarios;
END$$
/* CONTRASEÑA */
DROP PROCEDURE IF EXISTS `consultoriomedico`.`spActualizaContraseña`$$
CREATE PROCEDURE `consultoriomedico`.`spActualizaContraseña`(in ppasswordUsuario VARCHAR(45), in pidUsuarios int)
    BEGIN
	update usuarios 
            set passwordUsuario = ppasswordUsuario
    where idUsuarios = pidUsuarios;
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
/* DOCTORES */
DROP PROCEDURE IF EXISTS `consultoriomedico`.`spActualizaDoctor`$$
CREATE PROCEDURE `consultoriomedico`.`spActualizaDoctor`(in pnombreDoctor varchar(45), in papellidosDoctor VARCHAR(45), in pcedulaDoctor int ,in ptelefonoDoctor varchar(10), in pcorreoDoctor VARCHAR(45), in pespecialidad varchar(45) ,in ptipoUsuario int,in pidDoctor int)
    BEGIN
	update doctor 
            set nombreDoctor     = pnombreDoctor, 
                apellidosDoctor  = papellidosDoctor,
                cedulaDoctor     = pcedulaDoctor,
                telefonoDoctor   = ptelefonoDoctor,
                correoDoctor     = pcorreoDoctor,
                especialidad     = pespecialidad,
                tipoUsuario      = ptipoUsuario
    where idDoctor = pidDoctor;
END$$
/* CITAS */
DROP PROCEDURE IF EXISTS `consultoriomedico`.`spActualizaCita`$$
CREATE PROCEDURE `consultoriomedico`.`spActualizaCita`(in pfechaCita varchar(10), in pdescripcion VARCHAR(45), in pdoctorAsignado int ,in pidPaciente int)
    BEGIN
	update cita 
            set fechaCita        = pfechaCita, 
                descripcion      = pdescripcion,
                doctorAsignado   = pdoctorAsignado
    where idCita = pidCita;
END$$
/* EXPEDIENTES */
DROP PROCEDURE IF EXISTS `consultoriomedico`.`spActualizaExpediente`$$
CREATE PROCEDURE `consultoriomedico`.`spActualizaExpediente`(in pexPaciente int ,in pexDoctor int, in pexConsulta int ,in pidExpediente int)
    BEGIN
	update expediente 
            set exPaciente       = pexPaciente, 
                exDoctor         = pexDoctor,
                exConsulta       = pexConsulta
    where idExpediente = pidExpediente;
END$$
/* ********************________DELETES___________******************** */
/* Rol */
DROP PROCEDURE IF EXISTS `consultoriomedico`.`spEliminaRol`$$
CREATE PROCEDURE `consultoriomedico`.`spEliminaRol`(in pidRol int)
    BEGIN
	delete from tipousuario where idtipoUsuario = pidRol;
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
/* DOCTORES */
DROP PROCEDURE IF EXISTS `consultoriomedico`.`spEliminaDoctor`$$
CREATE PROCEDURE `consultoriomedico`.`spEliminaDoctor`(in pidDoctor int)
    BEGIN
	delete from doctor where idDoctor = pidDoctor;
END$$
/* EXPEDIENTES */
DROP PROCEDURE IF EXISTS `consultoriomedico`.`spEliminaExpediente`$$
CREATE PROCEDURE `consultoriomedico`.`spEliminaExpediente`(in pidExpediente int)
    BEGIN
	delete from expediente where idExpediente = pidExpediente;
END$$
DELIMITER ;  