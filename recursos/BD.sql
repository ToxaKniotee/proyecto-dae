DROP DATABASE IF EXISTS DAEITESMCCV;
CREATE DATABASE DAEITESMCCV;
USE DAEITESMCCV;

DROP TABLE IF EXISTS Alumnos;
CREATE TABLE Alumnos(
	Matricula		VARCHAR(9)		NOT NULL,
	Nombre			VARCHAR(50)		NOT NULL,
	Apellido		VARCHAR(50)		NOT NULL,
	Password		VARCHAR(50)		NOT NULL,
	Generacion		SMALLINT		NOT NULL,
	Puntaje_Total	INT				NOT NULL,
	PRIMARY KEY (Matricula)
);

DROP TABLE IF EXISTS Administradores;
CREATE TABLE Administradores(
	Nomina		VARCHAR(9)		NOT NULL,
	Password	VARCHAR(50)		NOT NULL,
	PRIMARY KEY (Nomina)
);

DROP TABLE IF EXISTS Actividades;
CREATE TABLE Actividades(
	Id				INT			NOT NULL AUTO_INCREMENT,
	Estado			TINYINT		NOT NULL,
	Nombre			VARCHAR(50)	NOT NULL,
	Descripcion		VARCHAR(50)	NOT NULL,
	Alumno			VARCHAR(9)	NOT NULL,
	Categoria		VARCHAR(10)	NOT NULL,
	Tipo			VARCHAR(10)	NOT NULL,
	Rol				VARCHAR(10)	NOT NULL,
	Periodo			VARCHAR(10)	NOT NULL,
	AreaImpacto		VARCHAR(10)	NOT NULL,
	Aprendizajes	VARCHAR(50)	NOT NULL,
	Competencias	VARCHAR(50)	NOT NULL,
	Puntaje			INT	,
	Observaciones  VARCHAR(50)	,
	PRIMARY KEY (Id),
	CONSTRAINT FK_Actividades_Alumnos
		FOREIGN KEY (Alumno) REFERENCES Alumnos(Matricula)
);

INSERT INTO Alumnos (Matricula, Nombre, Apellido, Password, Generacion, Puntaje_Total) VALUES ('A00123456', 'Nombre', 'Apellido', 'A00123456', 2010, 0);
INSERT INTO Administradores (Nomina, Password) VALUES ('A00123456', 'A00123456');