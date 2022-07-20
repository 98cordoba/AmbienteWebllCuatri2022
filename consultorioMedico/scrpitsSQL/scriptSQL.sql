drop schema `consultoriomedico`;

CREATE SCHEMA `consultoriomedico` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci ;

CREATE TABLE `consultoriomedico`.`tipousuario` (
  idtipoUsuario INT NOT NULL AUTO_INCREMENT,
  tipoDeUsuario VARCHAR(45) NOT NULL,
  PRIMARY KEY (idtipoUsuario))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;

INSERT INTO `consultoriomedico`.`tipousuario` (idtipoUsuario,tipoDeUsuario) VALUES (1,'Administrador');
INSERT INTO `consultoriomedico`.`tipousuario` (idtipoUsuario,tipoDeUsuario) VALUES (2,'Consultor');


CREATE TABLE `consultoriomedico`.`usuarios` (
  idUsuarios INT NOT NULL AUTO_INCREMENT,
  nombreUsuario VARCHAR(45) NOT NULL,
  passwordUsuario VARCHAR(45) NOT NULL,
  tipoUsuario INT NOT NULL,
  PRIMARY KEY (idusuarios),
  foreign key(tipoUsuario)references `consultoriomedico`.`tipousuario`(idtipoUsuario))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;

INSERT INTO `consultoriomedico`.`usuarios` (idUsuarios,nombreUsuario,passwordUsuario,tipoUsuario) VALUES (1,'admin','123',1);
INSERT INTO `consultoriomedico`.`usuarios` (idUsuarios,nombreUsuario,passwordUsuario,tipoUsuario) VALUES (2,'consul','123',2);

CREATE TABLE `consultoriomedico`.`doctor` (
  idDoctor INT NOT NULL AUTO_INCREMENT,
  nombreDoctor VARCHAR(45) NOT NULL,
  cedulaDoctor INT NOT NULL,
  telefonoDoctor INT NOT NULL,
  correoDoctor VARCHAR(45) NOT NULL,
  especialidad VARCHAR(45) NOT NULL,
  tipoUsuario INT NOT NULL,
  PRIMARY KEY (idDoctor),
  foreign key(tipoUsuario)references `consultoriomedico`.`tipousuario`(idtipoUsuario))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;

CREATE TABLE `consultoriomedico`.`cita` (
  idCita INT NOT NULL AUTO_INCREMENT,
  fechaCita DATE NOT NULL,
  descripcion VARCHAR(45) NOT NULL,
  doctorAsignado INT NOT NULL,
  PRIMARY KEY (idCita),
  foreign key(doctorAsignado)references `consultoriomedico`.`doctor`(idDoctor))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;

CREATE TABLE `consultoriomedico`.`pacientes` (
  idPaciente INT NOT NULL AUTO_INCREMENT,
  nombrePaciente VARCHAR(45) NOT NULL,
  cedulaPaciente INT NOT NULL,
  fechaNacimiento DATE NOT NULL,
  telefonoPaciente INT NOT NULL,
  correoPaciente VARCHAR(45) NOT NULL,
  citaPaciente INT NOT NULL,
  PRIMARY KEY (idPaciente),
  foreign key(citaPaciente)references `consultoriomedico`.`cita`(idCita))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;
