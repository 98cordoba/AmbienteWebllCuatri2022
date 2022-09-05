drop schema `consultoriomedico`; -- borrar esquema
/* ************Crear base de datos************ */
CREATE SCHEMA `consultoriomedico` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci ;
/* ********************________TABLA ROLES___________******************** */
CREATE TABLE `consultoriomedico`.`roles` (
  idRol       INT NOT NULL AUTO_INCREMENT,
  nombreRol   VARCHAR(45) NOT NULL,
  PRIMARY KEY (idRol))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;
/* ********************________INSERT ROLES___________******************** */
INSERT INTO `consultoriomedico`.`roles` (idRol,nombreRol) VALUES (1,'Administrador');
INSERT INTO `consultoriomedico`.`roles` (idRol,nombreRol) VALUES (2,'Consultor');
INSERT INTO `consultoriomedico`.`roles` (idRol,nombreRol) VALUES (3,'Recepcion');
INSERT INTO `consultoriomedico`.`roles` (idRol,nombreRol) VALUES (4,'TI');
INSERT INTO `consultoriomedico`.`roles` (idRol,nombreRol) VALUES (5,'Doctor');
INSERT INTO `consultoriomedico`.`roles` (idRol,nombreRol) VALUES (6,'Recursos Humanos');
/* ********************________TABLA USUARIOS___________******************** */
CREATE TABLE `consultoriomedico`.`usuarios` (
  idUsuario         INT NOT NULL AUTO_INCREMENT,
  nombreUsuario     VARCHAR(45) NOT NULL,
  passwordUsuario   VARCHAR(45) NOT NULL,
  rol               INT NOT NULL,
  PRIMARY KEY (idusuario),
  foreign key(rol)references `consultoriomedico`.`roles`(idRol))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;
/* ********************________INSERT USUARIOS___________******************** */
INSERT INTO `consultoriomedico`.`usuarios` (idUsuario,nombreUsuario,passwordUsuario,rol) VALUES (1,'admin','123',1);
INSERT INTO `consultoriomedico`.`usuarios` (idUsuario,nombreUsuario,passwordUsuario,rol) VALUES (2,'Joseph','123',1);
INSERT INTO `consultoriomedico`.`usuarios` (idUsuario,nombreUsuario,passwordUsuario,rol) VALUES (3,'Donnkan','123',1);
INSERT INTO `consultoriomedico`.`usuarios` (idUsuario,nombreUsuario,passwordUsuario,rol) VALUES (4,'TI','123',4);
INSERT INTO `consultoriomedico`.`usuarios` (idUsuario,nombreUsuario,passwordUsuario,rol) VALUES (5,'consul','123',2);
INSERT INTO `consultoriomedico`.`usuarios` (idUsuario,nombreUsuario,passwordUsuario,rol) VALUES (6,'recepcion','123',3);
INSERT INTO `consultoriomedico`.`usuarios` (idUsuario,nombreUsuario,passwordUsuario,rol) VALUES (7,'Doctor','123',5);
INSERT INTO `consultoriomedico`.`usuarios` (idUsuario,nombreUsuario,passwordUsuario,rol) VALUES (8,'RH','123',6);
/* ********************________TABLA EMPLEADOS___________******************** */
CREATE TABLE `consultoriomedico`.`empleados` (
  idEmpleado          INT NOT NULL AUTO_INCREMENT,
  nombreEmpleado      VARCHAR(45) NOT NULL,
  apellidosEmpleado   VARCHAR(45) NOT NULL,
  cedulaEmpleado      VARCHAR(20) NOT NULL,
  telefonoEmpleado    VARCHAR(20) NOT NULL,
  correoEmpleado      VARCHAR(45) NOT NULL,
  especialidad        VARCHAR(45) NULL,
  salario             INT NOT NULL,
  usuario             INT NULL,
  PRIMARY KEY (idEmpleado),
  foreign key(usuario)references `consultoriomedico`.`usuarios`(idUsuario))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;
/* ********************________INSERT EMPLEADOS___________******************** */
INSERT INTO `consultoriomedico`.`empleados` (idEmpleado,nombreEmpleado,apellidosEmpleado,cedulaEmpleado,telefonoEmpleado,correoEmpleado,especialidad,salario,usuario)
VALUES (1,'Joseph Fabian',"Cordoba Aguero ",'207860359','70148852','fabiansb98@gmail.com','Administrador',10000,2);
INSERT INTO `consultoriomedico`.`empleados` (idEmpleado,nombreEmpleado,apellidosEmpleado,cedulaEmpleado,telefonoEmpleado,correoEmpleado,especialidad,salario,usuario)
VALUES (2,'Donnkan',"Cervantes",'207860359','11111111','donnkan@gmail.com','Administrador',10000,3);
INSERT INTO `consultoriomedico`.`empleados` (idEmpleado,nombreEmpleado,apellidosEmpleado,cedulaEmpleado,telefonoEmpleado,correoEmpleado,especialidad,salario,usuario)
VALUES (3,'Alicia',"Fernandes Valverde ",'101163671','22221111','correoD2@gmail.com','Recursos Humanos',1000,8);
INSERT INTO `consultoriomedico`.`empleados` (idEmpleado,nombreEmpleado,apellidosEmpleado,cedulaEmpleado,telefonoEmpleado,correoEmpleado,especialidad,salario,usuario)
VALUES (4,'Jose Vicente',"Fallas Mena",'101270810','11112222','correoD2@gmail.com','Cirujano',5000,7);
INSERT INTO `consultoriomedico`.`empleados` (idEmpleado,nombreEmpleado,apellidosEmpleado,cedulaEmpleado,telefonoEmpleado,correoEmpleado,especialidad,salario,usuario)
VALUES (5,'Chi',"Phan Wu",'116450808','22684506','chiph@yahoo.com','Secretaria',2000,6);
INSERT INTO `consultoriomedico`.`empleados` (idEmpleado,nombreEmpleado,apellidosEmpleado,cedulaEmpleado,telefonoEmpleado,correoEmpleado,especialidad,salario,usuario)
VALUES (6,'Alberto',"Molina Mora",'601450889','44042209','albertomm@hotmail.com','Especialista',4000,5);
INSERT INTO `consultoriomedico`.`empleados` (idEmpleado,nombreEmpleado,apellidosEmpleado,cedulaEmpleado,telefonoEmpleado,correoEmpleado,especialidad,salario,usuario)
VALUES (7,'Admin',"Apellidos Admin",'111111111','22222222','correoAdmin@gmail.com','Administrador',10000,1);
/* ********************________TABLA PACIENTES___________******************** */
CREATE TABLE `consultoriomedico`.`pacientes` (
  idPaciente            INT NOT NULL AUTO_INCREMENT,
  nombrePaciente        VARCHAR(45) NOT NULL,
  apellidosPaciente     VARCHAR(45) NOT NULL,
  cedulaPaciente        VARCHAR(20) NOT NULL,
  fechaNacimiento       VARCHAR(10) NOT NULL,
  telefonoPaciente      VARCHAR(20) NOT NULL,
  correoPaciente        VARCHAR(45) NOT NULL,
  expediente            INT NULL,
  PRIMARY KEY (idPaciente))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;
/* ********************________INSERT PACIENTES___________******************** */
INSERT INTO `consultoriomedico`.`pacientes` (idPaciente,nombrePaciente,apellidosPaciente,cedulaPaciente,fechaNacimiento,telefonoPaciente,correoPaciente,expediente)
VALUES (1,'Dinora',"Obando Garcia",'101019387',"1998-11-20",'99998888','paciente1@gmail.com',1);
INSERT INTO `consultoriomedico`.`pacientes` (idPaciente,nombrePaciente,apellidosPaciente,cedulaPaciente,fechaNacimiento,telefonoPaciente,correoPaciente,expediente)
VALUES (2,'Alejandro',"Araya Borge",'101086526',"1990-04-20",'88889999','paciente2@gmail.com',2);
INSERT INTO `consultoriomedico`.`pacientes` (idPaciente,nombrePaciente,apellidosPaciente,cedulaPaciente,fechaNacimiento,telefonoPaciente,correoPaciente,expediente)
VALUES (3,'Gabriel',"Palacios Salazar",'101240481',"1979-02-15",'88976232','gabriel.ps@hotmail.com',3);
INSERT INTO `consultoriomedico`.`pacientes` (idPaciente,nombrePaciente,apellidosPaciente,cedulaPaciente,fechaNacimiento,telefonoPaciente,correoPaciente,expediente)
VALUES (4,'Maria',"Bermudez Castillo",'101300929',"1985-09-28",'86016623','maria.bp@yahoo.com',4);
/* ********************________TABLA CITAS___________******************** */
CREATE TABLE `consultoriomedico`.`cita` (
  idCita            INT NOT NULL AUTO_INCREMENT,
  fechaCita         VARCHAR(10) NOT NULL,
  descripcion       VARCHAR(45) NOT NULL,
  doctorAsignado    INT NOT NULL,
  cidPaciente       INT NOT NULL,
  PRIMARY KEY (idCita),
  foreign key(doctorAsignado)references `consultoriomedico`.`empleados`(idEmpleado),
  foreign key (cidPaciente) references `consultoriomedico`.`pacientes`(idPaciente))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;
/* ********************________INSERT CITAS___________******************** */
INSERT INTO `consultoriomedico`.`cita` (idCita,fechaCita,descripcion,doctorAsignado,cidPaciente) VALUES (1,'2022-07-20','Consulta General',3, 1);
INSERT INTO `consultoriomedico`.`cita` (idCita,fechaCita,descripcion,doctorAsignado,cidPaciente) VALUES (2,'2021-07-20','Consulta General',3, 1);
INSERT INTO `consultoriomedico`.`cita` (idCita,fechaCita,descripcion,doctorAsignado,cidPaciente) VALUES (3,'2022-07-21','Consulta General',4, 2);
INSERT INTO `consultoriomedico`.`cita` (idCita,fechaCita,descripcion,doctorAsignado,cidPaciente) VALUES (4,'2021-07-22','Consulta General',5, 2);
INSERT INTO `consultoriomedico`.`cita` (idCita,fechaCita,descripcion,doctorAsignado,cidPaciente) VALUES (5,'2022-07-23','Consulta General',6, 3);
INSERT INTO `consultoriomedico`.`cita` (idCita,fechaCita,descripcion,doctorAsignado,cidPaciente) VALUES (6,'2021-07-24','Consulta General',3, 4);