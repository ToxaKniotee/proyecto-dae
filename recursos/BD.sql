CREATE DATABASE DAEITESMCCV;
USE DAEITESMCCV;

DROP TABLE IF EXISTS Alumnos;
CREATE TABLE Alumnos(
	Matricula   	TEXT(9)	NOT NULL,
	Nombre      	TEXT   	NOT NULL,
	Apellido    	TEXT   	NOT NULL,
	PRIMARY KEY (Matricula)
);

DROP TABLE IF EXISTS Administradores;
CREATE TABLE Administradores(
	Nomina      	TEXT(9)	NOT NULL,
	Password    	TEXT   	NOT NULL,
	PRIMARY KEY (Nomina)
);

DROP TABLE IF EXISTS Actividades;
CREATE TABLE Actividades(
	Id          	INT    	NOT NULL,
	Alumno      	INT    	NOT NULL,
	Tipo        	INT    	NOT NULL,
	Nombre      	TEXT   	NOT NULL,
	Descripcion 	TEXT   	NOT NULL,
	Rol         	INT    	NOT NULL,
	Periodo     	INT    	NOT NULL,
	AreaImpacto 	INT    	NOT NULL,
	Aprendizajes	TEXT   	NOT NULL,
	Competencias	TEXT   	NOT NULL,
	PRIMARY KEY (Id)
);

DROP TABLE IF EXISTS Tipos;
CREATE TABLE Tipos(
	Id          	INT    	NOT NULL AUTO_INCREMENT,
	Categoria   	INT    	NOT NULL,
	Nombre      	TEXT   	NOT NULL,
	PRIMARY KEY (Id)
);

DROP TABLE IF EXISTS Roles;
CREATE TABLE Roles(
	Id          	INT    	NOT NULL AUTO_INCREMENT,
	Rol         	INT    	NOT NULL,
	PRIMARY KEY (Id)
);

DROP TABLE IF EXISTS Periodos;
CREATE TABLE Periodos(
	Id          	INT    	NOT NULL AUTO_INCREMENT,
	Periodo     	INT    	NOT NULL,
	PRIMARY KEY (Id)
);

DROP TABLE IF EXISTS AreasImpacto;
CREATE TABLE AreasImpacto(
	Id          	INT    	NOT NULL AUTO_INCREMENT,
	AreaImpacto 	TEXT   	NOT NULL,
	PRIMARY KEY (Id)
);

INSERT INTO Roles VALUES('Organizador'), ('Colaborador'), ('Participante');

INSERT INTO Periodos VALUES('Bimestral Sep - Nov de 2014'), ('Marzo - Noviembre de 2014'), ('Semestral  Ago - Dic de 2014'), ('Semestral Ene - May de 2015'), ('Septiembre 2014 - Marzo 2015'), ('Tetramestral May - Ago 2014'), ('Tetramestral Sep - Dic 2014'), ('Tetramestre Sep-Dic 2014'), ('Trimestral Ene - Abr de 2015'), ('Trimestral Sep - Dic de 2014');

INSERT INTO AreasImpacto VALUES('Social'), ('Ambiental'), ('Económico');