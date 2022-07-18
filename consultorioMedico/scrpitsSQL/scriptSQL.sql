drop schema `consultorio`;

CREATE SCHEMA `consultorio` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci ;

CREATE TABLE `consultorio`.`tipousuario` (
  `idtipoUsuario` INT NOT NULL AUTO_INCREMENT,
  `tipoDeUsuario` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idtipoUsuario`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


CREATE TABLE `consultorio`.`usuarios` (
  `idUsuarios` INT NOT NULL AUTO_INCREMENT,
  `nombreUsuario` VARCHAR(45) NOT NULL,
  `passwordUsuario` VARCHAR(45) NOT NULL,
  `tipoUsuario` INT NOT NULL,
  PRIMARY KEY (`idusuarios`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


CREATE TABLE `consultorio`.`pacientes` (
  `idPaciente` INT NOT NULL AUTO_INCREMENT,
  `nombrePaciente` VARCHAR(45) NOT NULL,
  `cedulaPaciente` INT NOT NULL,
  `fechaNacimiento` DATE NOT NULL,
  `telefonoPaciente` INT NOT NULL,
  `correoPaciente` VARCHAR(45) NOT NULL,
  `citaPaciente` INT NOT NULL,
  PRIMARY KEY (`idPaciente`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;

CREATE TABLE `consultorio`.`doctor` (
  `idDoctor` INT NOT NULL AUTO_INCREMENT,
  `nombreDoctor` VARCHAR(45) NOT NULL,
  `cedulaDoctor` INT NOT NULL,
  `telefonoDoctor` INT NOT NULL,
  `correoDoctor` VARCHAR(45) NOT NULL,
  `especialidad` VARCHAR(45) NOT NULL,
  `tipoUsuario` INT NOT NULL,
  PRIMARY KEY (`idDoctor`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;

CREATE TABLE `consultorio`.`cita` (
  `idCita` INT NOT NULL AUTO_INCREMENT,
  `fechaCita` DATE NOT NULL,
  `descripcion` VARCHAR(45) NOT NULL,
  `doctorAsignado` INT NOT NULL,
  PRIMARY KEY (`idCita`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


ALTER TABLE `consultorio`.`usuarios` 
ADD INDEX `tipofk_idx` (`tipoUsuario` ASC) VISIBLE;
;
ALTER TABLE `consultorio`.`usuarios` 
ADD CONSTRAINT `tipofk`
  FOREIGN KEY (`tipoUsuario`)
  REFERENCES `consultorio`.`tipousuario` (`idtipoUsuario`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;
  
  
  ALTER TABLE `consultorio`.`pacientes` 
ADD INDEX `pacienteCitafk_idx` (`citaPaciente` ASC) VISIBLE;
;
ALTER TABLE `consultorio`.`pacientes` 
ADD CONSTRAINT `pacienteCitafk`
  FOREIGN KEY (`citaPaciente`)
  REFERENCES `consultorio`.`cita` (`idCita`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;
  
  
  ALTER TABLE `consultorio`.`doctor` 
ADD INDEX `tipoUDoctorfk_idx` (`tipoUsuario` ASC) VISIBLE;
;
ALTER TABLE `consultorio`.`doctor` 
ADD CONSTRAINT `tipoUDoctorfk`
  FOREIGN KEY (`tipoUsuario`)
  REFERENCES `consultorio`.`tipousuario` (`idtipoUsuario`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;
  
  
  ALTER TABLE `consultorio`.`cita` 
ADD INDEX `citaDoctorfk_idx` (`doctorAsignado` ASC) VISIBLE;
;
ALTER TABLE `consultorio`.`cita` 
ADD CONSTRAINT `citaDoctorfk`
  FOREIGN KEY (`doctorAsignado`)
  REFERENCES `consultorio`.`doctor` (`idDoctor`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;