DROP DATABASE IF EXISTS bd_clinica_cordis_teste;
CREATE DATABASE bd_clinica_cordis_teste;
USE bd_clinica_cordis_teste;

CREATE TABLE tb_usuarios(
	id 				        INT NOT NULL AUTO_INCREMENT,
	login					VARCHAR(60) NOT NULL,
	senha					VARCHAR(32) NOT NULL,
	ativo 					BOOLEAN NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE tb_usuarios_permissoes(
	id 						INT NOT NULL AUTO_INCREMENT,	
	id_usuario 				INT NOT NULL,
	id_permissao			INT NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (id_usuario) REFERENCES tb_usuarios (id),
	FOREIGN KEY (id_permissao) REFERENCES tb_permissoes (id)
);

CREATE TABLE tb_pessoas (
	id        			    INT NOT NULL AUTO_INCREMENT,	
	nome					VARCHAR(60) NOT NULL ,
    cpf						CHAR(14) NOT NULL ,
	rg                      CHAR(10) NOT NULL,
    sexo					CHAR(1) NOT NULL ,
    nascimento				DATE NOT NULL ,
	email					VARCHAR(60) NOT NULL ,
    id_endereco				INT NOT NULL ,
    id_usuario				INT NOT NULL ,
	PRIMARY KEY (id),
	FOREIGN KEY (id_endereco) REFERENCES tb_enderecos (id),
	FOREIGN KEY (id_usuario) REFERENCES tb_usuarios (id)
);

CREATE TABLE tb_pacientes (
	id_pessoa               INT NOT NULL,
    id_usuario              INT NOT NULL,
	FOREIGN KEY (id_pessoa) REFERENCES tb_pessoas (id),
    FOREIGN KEY (tb_usuario) REFERENCES tb_usuario (id)
);

CREATE TABLE tb_prontuarios (
    id						INT NOT NULL AUTO_INCREMENT,
	nome					VARCHAR(60) NOT NULL ,
	ativo 					BOOLEAN NOT NULL ,
	id_paciente				INT NOT NULL ,
    id_usuario              INT NOT NULL,
    PRIMARY KEY (id) ,
    FOREIGN KEY (id_paciente) REFERENCES tb_pacientes (id),
    FOREIGN KEY (tb_usuario) REFERENCES tb_usuario (id)
);

CREATE TABLE tb_medicos (
	cor_agenda				VARCHAR(10) NOT NULL ,
	crm						VARCHAR(30) NOT NULL ,
	especialidade			VARCHAR(60) NOT NULL ,
	ativo					BOOLEAN NOT NULL ,
	id_pessoa               INT NOT NULL,
    id_usuario              INT NOT NULL,
	FOREIGN KEY (id_pessoa) REFERENCES tb_pessoas (id),
    FOREIGN KEY (tb_usuario) REFERENCES tb_usuario (id)
);

CREATE TABLE tb_secretarias (
	cor_agenda				VARCHAR(10) NOT NULL ,
	ativo					BOOLEAN NOT NULL ,
	id_pessoa               INT NOT NULL,
    id_usuario              INT NOT NULL,             
	FOREIGN KEY (id_pessoa) REFERENCES tb_pessoas (id),
    FOREIGN KEY (tb_usuario) REFERENCES tb_usuario (id)
);

CREATE TABLE tb_administradores(
	ativo					BOOLEAN NOT NULL ,
	id_pessoa               INT NOT NULL,
    id_usuario              INT NOT NULL,
	FOREIGN KEY (id_pessoa) REFERENCES tb_pessoas (id),
    FOREIGN KEY (tb_usuario) REFERENCES tb_usuario (id)
);