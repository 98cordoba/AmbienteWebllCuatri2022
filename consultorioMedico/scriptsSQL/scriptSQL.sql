drop schema `consultoriomedico`; -- borrar esquema
--************Crear base de datos************
CREATE SCHEMA `consultoriomedico` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci ;
--************Tabla roles************
CREATE TABLE `consultoriomedico`.`tipousuario` (
  idtipoUsuario INT NOT NULL AUTO_INCREMENT,
  tipoDeUsuario VARCHAR(45) NOT NULL,
  PRIMARY KEY (idtipoUsuario))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;
--************Insert roles************
INSERT INTO `consultoriomedico`.`tipousuario` (idtipoUsuario,tipoDeUsuario) VALUES (1,'Administrador');
INSERT INTO `consultoriomedico`.`tipousuario` (idtipoUsuario,tipoDeUsuario) VALUES (2,'Consultor');
INSERT INTO `consultoriomedico`.`tipousuario` (idtipoUsuario,tipoDeUsuario) VALUES (3,'Recepcion');
--************Tabla usuarios************
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
--************Insert Usuarios************
INSERT INTO `consultoriomedico`.`usuarios` (idUsuarios,nombreUsuario,passwordUsuario,tipoUsuario) VALUES (1,'admin','123',1);
INSERT INTO `consultoriomedico`.`usuarios` (idUsuarios,nombreUsuario,passwordUsuario,tipoUsuario) VALUES (2,'consul','123',2);
INSERT INTO `consultoriomedico`.`usuarios` (idUsuarios,nombreUsuario,passwordUsuario,tipoUsuario) VALUES (3,'recep','123',3);
INSERT INTO `consultoriomedico`.`usuarios` (idUsuarios,nombreUsuario,passwordUsuario,tipoUsuario) VALUES (4,'Joseph','123',2);
INSERT INTO `consultoriomedico`.`usuarios` (idUsuarios,nombreUsuario,passwordUsuario,tipoUsuario) VALUES (5,'Donnkan','123',3);
--************Tabla Doctor************
CREATE TABLE `consultoriomedico`.`doctor` (
  idDoctor INT NOT NULL AUTO_INCREMENT,
  nombreDoctor VARCHAR(45) NOT NULL,
  apellidosDoctor VARCHAR(45) NOT NULL,
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
--************Insert Doctor************
INSERT INTO `consultoriomedico`.`doctor` (idDoctor,nombreDoctor,apellidosDoctor,cedulaDoctor,telefonoDoctor,correoDoctor,especialidad,tipoUsuario)
VALUES (1,'Doctor1',"Apellido Doctor1",12345678,22221111,'correoD2@gmail.com','Pediatra',2);
INSERT INTO `consultoriomedico`.`doctor` (idDoctor,nombreDoctor,apellidosDoctor,cedulaDoctor,telefonoDoctor,correoDoctor,especialidad,tipoUsuario)
VALUES (2,'Doctor2',"Apellido Doctor2",12345679,11112222,'correoD2@gmail.com','Cirujano',2);
INSERT INTO `consultoriomedico`.`doctor` (idDoctor,nombreDoctor,apellidosDoctor,cedulaDoctor,telefonoDoctor,correoDoctor,especialidad,tipoUsuario)
VALUES (3,'Chi',"Phan Wu",116450808,22684506,'chiph@yahoo.com','Dentista',2);
INSERT INTO `consultoriomedico`.`doctor` (idDoctor,nombreDoctor,apellidosDoctor,cedulaDoctor,telefonoDoctor,correoDoctor,especialidad,tipoUsuario)
VALUES (4,'Alberto',"Molina Mora",601450889,44042209,'albertomm@hotmail.com','Medicina General',2);
--************Tabla Pacientes************
CREATE TABLE `consultoriomedico`.`pacientes` (
  idPaciente INT NOT NULL AUTO_INCREMENT,
  nombrePaciente VARCHAR(45) NOT NULL,
  apellidosPaciente VARCHAR(45) NOT NULL,
  cedulaPaciente INT NOT NULL,
  fechaNacimiento VARCHAR(10) NOT NULL,
  telefonoPaciente INT NOT NULL,
  correoPaciente VARCHAR(45) NOT NULL,
  PRIMARY KEY (idPaciente))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;
--************Insert Pacientes************
INSERT INTO `consultoriomedico`.`pacientes` (idPaciente,nombrePaciente,apellidosPaciente,cedulaPaciente,fechaNacimiento,telefonoPaciente,correoPaciente)
VALUES (1,'Paciente1',"Apellido Paciente1",44443333,"1998-11-20",99998888,'paciente1@gmail.com');
INSERT INTO `consultoriomedico`.`pacientes` (idPaciente,nombrePaciente,apellidosPaciente,cedulaPaciente,fechaNacimiento,telefonoPaciente,correoPaciente)
VALUES (2,'Paciente2',"Apellido Paciente2",33334444,"1990-04-20",88889999,'paciente2@gmail.com');
INSERT INTO `consultoriomedico`.`pacientes` (idPaciente,nombrePaciente,apellidosPaciente,cedulaPaciente,fechaNacimiento,telefonoPaciente,correoPaciente)
VALUES (3,'Gabriel',"Palacios Salazar",115482956,"1979-02-15",88976232,'gabriel.ps@hotmail.com');
INSERT INTO `consultoriomedico`.`pacientes` (idPaciente,nombrePaciente,apellidosPaciente,cedulaPaciente,fechaNacimiento,telefonoPaciente,correoPaciente)
VALUES (4,'Maria',"Bermudez Castillo",601450879,"1985-09-28",86016623,'maria.bp@yahoo.com');
--************Tabla Cita************
CREATE TABLE `consultoriomedico`.`cita` (
  idCita INT NOT NULL AUTO_INCREMENT,
  fechaCita VARCHAR(10) NOT NULL,
  descripcion VARCHAR(45) NOT NULL,
  doctorAsignado INT NOT NULL,
  cidPaciente INT NOT NULL,
  PRIMARY KEY (idCita),
  foreign key(doctorAsignado)references `consultoriomedico`.`doctor`(idDoctor),
  foreign key (cidPaciente) references `consultoriomedico`.`pacientes`(idPaciente))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;
--************Insert Cita************
INSERT INTO `consultoriomedico`.`cita` (idCita,fechaCita,descripcion,doctorAsignado,cidPaciente) VALUES (1,'2022-07-20','Consulta General',1, 1);
INSERT INTO `consultoriomedico`.`cita` (idCita,fechaCita,descripcion,doctorAsignado,cidPaciente) VALUES (2,'2022-07-21','Consulta General',2, 2);
INSERT INTO `consultoriomedico`.`cita` (idCita,fechaCita,descripcion,doctorAsignado,cidPaciente) VALUES (3,'2022-07-22','Consulta General',1, 2);
INSERT INTO `consultoriomedico`.`cita` (idCita,fechaCita,descripcion,doctorAsignado,cidPaciente) VALUES (4,'2022-07-23','Consulta General',2, 3);
INSERT INTO `consultoriomedico`.`cita` (idCita,fechaCita,descripcion,doctorAsignado,cidPaciente) VALUES (5,'2022-07-24','Consulta General',1, 4);
--************Tabla Expediente************
CREATE TABLE `consultoriomedico`.`expediente` (
  idExpediente INT NOT NULL AUTO_INCREMENT,
  exPaciente INT NOT NULL,
  exDoctor INT NOT NULL,
  exConsulta INT NOT NULL,
  PRIMARY KEY (idExpediente),
  foreign key(exPaciente)references `consultoriomedico`.`pacientes`(idPaciente),
  foreign key(exDoctor)references `consultoriomedico`.`doctor`(idDoctor),
  foreign key(exConsulta)references `consultoriomedico`.`cita`(idCita))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;
--************Insert Expediente************
INSERT INTO `consultoriomedico`.`expediente` (idExpediente,exPaciente,exDoctor,exConsulta) VALUES (1,1,1,1);
INSERT INTO `consultoriomedico`.`expediente` (idExpediente,exPaciente,exDoctor,exConsulta) VALUES (2,2,2,2);
INSERT INTO `consultoriomedico`.`expediente` (idExpediente,exPaciente,exDoctor,exConsulta) VALUES (3,3,1,3);
INSERT INTO `consultoriomedico`.`expediente` (idExpediente,exPaciente,exDoctor,exConsulta) VALUES (4,4,1,4);
INSERT INTO `consultoriomedico`.`expediente` (idExpediente,exPaciente,exDoctor,exConsulta) VALUES (5,4,1,5);