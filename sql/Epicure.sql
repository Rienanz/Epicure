CREATE DATABASE IF NOT EXISTS Epicure;

USE Epicure;

CREATE TABLE Usuario (

	CodUsuario INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	NomeUsuario VARCHAR(100) NOT NULL,
	EmailUsuario VARCHAR(100) NOT NULL UNIQUE,
	NascimentoUsuario DATE NOT NULL,
	CPFUsuario VARCHAR(14) NOT NULL UNIQUE,
	SenhaUsuario VARCHAR(225) NOT NULL,
	ImagemUsuario LONGBLOB,
	PermissaoUsuario VARCHAR(20) NOT NULL
 
);

CREATE TABLE EnderecoUsuario (

	
	CodEnderecoUsuario INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	CodUsuario INT NOT NULL,
	RuaEnderecoUsuario VARCHAR(60) NOT NULL,
	CidadeEnderecoUsuario VARCHAR(45) NOT NULL,
	TipoEnderecoUsuario ENUM('Casa', 'Apartamento', 'Condominio', 'Outro') NOT NULL,
	NumEnderecoUsuario INT(5) NOT NULL,
	CEPEnderecoUsuario VARCHAR(45) NOT NULL,   
	
    FOREIGN KEY(CodUsuario) REFERENCES Usuario(CodUsuario)
 
 ); 
  
  
CREATE TABLE DetalhesEmpregado(

	CodEmpregado INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	CodUsuario INT NOT NULL,
	ConclusaoEmpregado ENUM('Ensino Fundamental I', 'Ensino Fundamental II', 'Ensino Médio', 'Ensino Superior', 'Pós-Graduação', 'Mestrado') NOT NULL,
	CondicaoEmpregado ENUM('Desempregado', 'Em busca do primeiro emprego', 'Reinserção no Mercado de Trabalho','Outro') NOT NULL,
	ExperienciaEmpregado ENUM('Nenhuma', '5-10 anos', '10-15 anos', '15+ anos') NOT NULL,
	CaracEmpregado1 VARCHAR(100) NOT NULL,
	CaracEmpregado2 VARCHAR(100) NOT NULL,
	CaracEmpregado3 VARCHAR(100) NOT NULL,
	CaracEmpregado4 VARCHAR(100) NOT NULL,
	
	FOREIGN KEY(CodUsuario) REFERENCES Usuario(CodUsuario)

);

create table Empresa(

	CodEmpresa INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	NomeEmpresa VARCHAR(50) NOT NULL,
	CNPJEmpresa VARCHAR(18) NOT NULL UNIQUE,
	EmailEmpresa VARCHAR(100) NOT NULL UNIQUE,
	TelefoneEmpresa VARCHAR(15) NOT NULL,
	ImagemEmpresa LONGBLOB,
	SenhaEmpresa VARCHAR(225) NOT NULL

);

CREATE TABLE EnderecoEmpresa (

	CodEnderecoEmpresa INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	CodEmpresa INT NOT NULL,
	RuaEnderecoEmpresa VARCHAR(60) NOT NULL,
	CidadeEnderecoEmpresa VARCHAR(45) NOT NULL,
	TipoEnderecoEmpresa ENUM('Casa', 'Predio', 'Galpao', 'Outro') NOT NULL,
	NumEnderecoEmpresa INT(5) NOT NULL,
	CEPEnderecoEmpresa VARCHAR(45) NOT NULL,
	
	FOREIGN KEY(CodEmpresa) REFERENCES Empresa(CodEmpresa)
 
); 
  

CREATE TABLE Vagas(

	CodVaga INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	CodEmpresa INT NOT NULL,
	TituloVaga VARCHAR(125) NOT NULL,
	TipoVaga ENUM('Presencial - Meio Período', 'Presencial - Integral', 'Home Office - Meio Período','Home Office - Integral','Outro') NOT NULL,
	DescricaoVaga MEDIUMTEXT NOT NULL,
	RequerimentosVaga MEDIUMTEXT NOT NULL,
	
	FOREIGN KEY(CodEmpresa) REFERENCES Empresa(CodEmpresa)

);

CREATE TABLE MidiaVagas(

	CodMidiaVaga INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	CodVaga INT NOT NULL,
	TipoVaga VARCHAR(25) NOT NULL,
	MidiaVagas LONGBLOB NOT NULL,
	
	FOREIGN KEY(CodVaga) REFERENCES Vagas(CodVaga)

);

CREATE TABLE Dicas(

	CodDicas INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	CodUsuario INT NOT NULL,
	TituloDicas VARCHAR(125) NOT NULL,
	DescricaoDicas MEDIUMTEXT NOT NULL,
	
	FOREIGN KEY(CodUsuario) REFERENCES Usuario(CodUsuario)

);

CREATE TABLE MidiaDicas(

	CodMidiaDica INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	CodDicas INT NOT NULL,
	TipoMidia VARCHAR(25) NOT NULL,
	MidiaDicas LONGBLOB NOT NULL,
	
	FOREIGN KEY(CodDicas) REFERENCES Dicas(CodDicas)

);

CREATE TABLE AvaliacaoDicas(

	CodAvaliacao INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	CodUsuario INT NOT NULL,
	NotaAvaliacao INT NOT NULL,
	
	FOREIGN KEY(CodUsuario) REFERENCES Usuario(CodUsuario)

);