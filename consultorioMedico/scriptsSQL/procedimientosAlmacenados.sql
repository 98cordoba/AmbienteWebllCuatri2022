DELIMITER $$

DROP PROCEDURE IF EXISTS `consultoriomedico`.`spGetRoles`$$

CREATE PROCEDURE `consultoriomedico`.`spGetRoles`()
    BEGIN
	SELECT idtipoUsuario, tipoDeUsuario FROM tipousuario;	
    END$$


DROP PROCEDURE IF EXISTS `consultoriomedico`.`spGetDoctores`$$

CREATE PROCEDURE `consultoriomedico`.`spGetDoctores`()
    BEGIN
	SELECT idDoctor, nombreDoctor, apellidosDoctor FROM doctor;	
    END$$

    
 DELIMITER ;   