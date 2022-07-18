CREATE TABLE `consultoriomedico`.`usuarios` (`idUsuario` INT NOT NULL AUTO_INCREMENT , `usuario` VARCHAR(40) NOT NULL , `contraseñaUsuario` VARCHAR(50) NOT NULL , `nombreUsuario` VARCHAR(80) NOT NULL , `tipoUsuario` INT NOT NULL , PRIMARY KEY (`idUsuario`)) ENGINE = InnoDB;

INSERT INTO `usuarios` (`idUsuario`, `usuario`, `contraseñaUsuario`, `nombreUsuario`, `tipoUsuario`) VALUES (NULL, 'admin', SHA1('123'), 'Joseph', '1')

INSERT INTO `usuarios` (`idUsuario`, `usuario`, `contraseñaUsuario`, `nombreUsuario`, `tipoUsuario`) VALUES (NULL, 'usuario', SHA1('123'), 'Donnkan', '2')