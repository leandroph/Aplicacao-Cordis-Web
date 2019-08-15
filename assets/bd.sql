DROP DATABASE IF EXISTS bd_clinica_cordis;
CREATE DATABASE bd_clinica_cordis;
USE bd_clinica_cordis;

CREATE TABLE tb_paises (
	id 						INT NOT NULL AUTO_INCREMENT,	
	nome     		        VARCHAR(60) NOT NULL ,
	sigla     		        CHAR(3) NOT NULL ,
	PRIMARY KEY (id)
);

CREATE TABLE tb_estados (
	id 	 			      	INT NOT NULL AUTO_INCREMENT ,
  	id_pais 		        INT NOT NULL,
  	nome   			        VARCHAR(60) NOT NULL ,
  	uf	 			        CHAR(2) NOT NULL,
	PRIMARY KEY (id),
  	FOREIGN KEY (id_pais) REFERENCES tb_paises (id)
);

CREATE TABLE tb_cidades (
    id       		     	INT NOT NULL AUTO_INCREMENT,
    id_estado              	INT NOT NULL,
    nome                	VARCHAR(60) NOT NULL ,
	PRIMARY KEY (id),
	FOREIGN KEY (id_estado) REFERENCES tb_estados (id) 
);

CREATE TABLE tb_enderecos (
    id		    		   	INT NOT NULL AUTO_INCREMENT,
    logradouro				VARCHAR(60) NOT NULL ,
    bairro					VARCHAR(60) NOT NULL ,
    numero					VARCHAR(10) NOT NULL ,
    cep						VARCHAR(10) NOT NULL ,
    complemento				VARCHAR(60) NOT NULL ,
    id_cidade				INT NOT NULL,	
	PRIMARY KEY (id),
	FOREIGN KEY (id_cidade) REFERENCES tb_cidades (id) 
);

CREATE TABLE tb_contatos (
    id		    		   	INT NOT NULL AUTO_INCREMENT,
    email					VARCHAR(60) NOT NULL ,
    telefone1				VARCHAR(30) NOT NULL ,
    telefone2				VARCHAR(30) NOT NULL ,	
	PRIMARY KEY (id) 
);

CREATE TABLE tb_permissoes (
    id			        	INT NOT NULL AUTO_INCREMENT,
    nome                	VARCHAR(30) NOT NULL ,
	PRIMARY KEY (id)
);

-- SENHA SERÁ APLICADA HASH MD5
CREATE TABLE tb_usuarios(
	id 				        INT NOT NULL AUTO_INCREMENT,
	login					VARCHAR(60) NOT NULL,
	senha					VARCHAR(32) NOT NULL,
	ativo 					BOOLEAN NOT NULL,
	PRIMARY KEY (id)
);

CREATE TABLE tb_usuarios_permissoes(
	id 						INT NOT NULL AUTO_INCREMENT,	
	id_usuario 				INT NOT NULL,
	id_permissao			INT NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (id_usuario) REFERENCES tb_usuarios (id),
	FOREIGN KEY (id_permissao) REFERENCES tb_permissoes (id)
);

-- mascara da data yyyy-mm-dd, sexo M, F ou O
CREATE TABLE tb_pacientes (
	id        			    INT NOT NULL AUTO_INCREMENT,	
	nome					VARCHAR(60) NOT NULL ,
    cpf						CHAR(14) NOT NULL ,
    sexo					CHAR(1) NOT NULL ,
    nascimento				DATE NOT NULL ,
    id_endereco				INT NOT NULL ,
    id_contato				INT NOT NULL ,
    id_usuario				INT NOT NULL ,
	PRIMARY KEY (id),
	FOREIGN KEY (id_endereco) REFERENCES tb_enderecos (id) ,
	FOREIGN KEY (id_contato) REFERENCES tb_contatos (id) ,
	FOREIGN KEY (id_usuario) REFERENCES tb_usuarios (id)
);

CREATE TABLE tb_prontuarios (
  	id						INT NOT NULL AUTO_INCREMENT,
	nome					VARCHAR(60) NOT NULL ,
	ativo 					BOOLEAN NOT NULL ,
	id_paciente				INT NOT NULL ,
	PRIMARY KEY (id) ,
	FOREIGN KEY (id_paciente) REFERENCES tb_pacientes (id)
);

CREATE TABLE tb_medicos (
  	id						INT NOT NULL AUTO_INCREMENT,
	nome					VARCHAR(60) NOT NULL ,
	cpf						CHAR(14) NOT NULL ,
	rg						CHAR(12) NOT NULL ,
	sexo					CHAR(1) NOT NULL ,
	nascimento				DATE NOT NULL ,
	cor_agenda				VARCHAR(10) NOT NULL ,
	crm						VARCHAR(30) NOT NULL ,
	especialidade			VARCHAR(60) NOT NULL ,
	ativo					BOOLEAN NOT NULL ,
	id_endereco				INT NOT NULL ,
	id_contato				INT NOT NULL ,
	id_usuario				INT NOT NULL ,
	PRIMARY KEY (id) ,
	FOREIGN KEY (id_endereco) REFERENCES tb_enderecos (id),
	FOREIGN KEY (id_contato) REFERENCES tb_contatos (id),
	FOREIGN KEY (id_usuario) REFERENCES tb_usuarios (id)
);

CREATE TABLE tb_secretarias (
  	id						INT NOT NULL AUTO_INCREMENT,
	nome					VARCHAR(60) NOT NULL ,
	cpf						CHAR(14) NOT NULL ,
	rg						CHAR(12) NOT NULL ,
	sexo					CHAR(1) NOT NULL ,
	nascimento				DATE NOT NULL ,
	cor_agenda				VARCHAR(10) NOT NULL ,
	ativo					BOOLEAN NOT NULL ,
	id_endereco				INT NOT NULL ,
	id_contato				INT NOT NULL ,
	id_usuario				INT NOT NULL ,
	PRIMARY KEY (id) ,
	FOREIGN KEY (id_endereco) REFERENCES tb_enderecos (id),
	FOREIGN KEY (id_contato) REFERENCES tb_contatos (id),
	FOREIGN KEY (id_usuario) REFERENCES tb_usuarios (id)
);

CREATE TABLE tb_convenios (
  	id						INT NOT NULL AUTO_INCREMENT,
	nome					VARCHAR(60) NOT NULL ,
	ativo					BOOLEAN NOT NULL ,
	nome_empresa			VARCHAR(60) NOT NULL ,
	cnpj_empresa			CHAR(18) NOT NULL ,
	id_endereco				INT NOT NULL ,
	id_contato				INT NOT NULL ,
	id_usuario				INT NOT NULL ,
	PRIMARY KEY (id) ,
	FOREIGN KEY (id_endereco) REFERENCES tb_enderecos (id),
	FOREIGN KEY (id_contato) REFERENCES tb_contatos (id),
	FOREIGN KEY (id_usuario) REFERENCES tb_usuarios (id)
);

CREATE TABLE tb_exames (
  	id						INT NOT NULL AUTO_INCREMENT,
	nome					VARCHAR(60) NOT NULL ,
	valor					DECIMAL(7, 2) NOT NULL ,
	especial				BOOLEAN NOT NULL ,
	ativo					BOOLEAN NOT NULL ,
	PRIMARY KEY (id)
);

CREATE TABLE tb_notificacoes (
  	id						INT NOT NULL AUTO_INCREMENT,
	nome					VARCHAR(60) NOT NULL ,
	ativo					BOOLEAN NOT NULL ,
	texto_troca_status		VARCHAR(255) NOT NULL ,
	texto_confirmacao		VARCHAR(255) NOT NULL ,
	nome_remetente			VARCHAR(60) NOT NULL ,
	PRIMARY KEY (id)
);

CREATE TABLE tb_notificacoes_sms (
  	id_notificacao			INT NOT NULL,
	api_key					VARCHAR(60) NOT NULL ,
	FOREIGN KEY (id_notificacao) REFERENCES tb_notificacoes (id)
);

-- senha aplicar hash MD5
CREATE TABLE tb_notificacoes_email (
  	id_notificacao			INT NOT NULL,
	email_remetente			VARCHAR(60) NOT NULL ,
	servidor				VARCHAR(60) NOT NULL ,
	porta					INT NOT NULL ,
	usuario					VARCHAR(60) NOT NULL ,
	senha					VARCHAR(32) NOT NULL ,
	cod_criptografia		ENUM('SSL', 'TLS', 'SSL/TLS'),
	email_oculto			VARCHAR(60) NOT NULL ,
	email_copia				VARCHAR(60) NOT NULL ,
	FOREIGN KEY (id_notificacao) REFERENCES tb_notificacoes (id)
);

CREATE TABLE tb_agendamentos (
  	id						INT NOT NULL AUTO_INCREMENT,
	data_hora_inicio		DATETIME NOT NULL ,
	data_hora_fim			DATETIME NOT NULL ,
	valor					DECIMAL(7,2) NOT NULL ,
	observacao				VARCHAR(255) NOT NULL ,
	senha					VARCHAR(32) NOT NULL,
	cod_status				ENUM('Agendado', 'Confirmado', 'Realizado', 'Cancelado'),
	pago 					BOOLEAN NOT NULL,
	id_not_email			INT NOT NULL,
	id_not_sms				INT NOT NULL,
	id_convenio				INT NOT NULL,
	id_exame				INT NOT NULL,
	id_secretaria			INT NOT NULL,
	id_paciente				INT NOT NULL,
	id_medico				INT NOT NULL,
	PRIMARY KEY (id) ,
	FOREIGN KEY (id_not_email) REFERENCES tb_notificacoes_email (id_notificacao) ,
	FOREIGN KEY (id_not_sms) REFERENCES tb_notificacoes_sms (id_notificacao) ,
	FOREIGN KEY (id_convenio) REFERENCES tb_convenios (id) ,
	FOREIGN KEY (id_exame) REFERENCES tb_exames (id) ,
	FOREIGN KEY (id_secretaria) REFERENCES tb_secretarias (id) ,
	FOREIGN KEY (id_paciente) REFERENCES tb_pacientes (id),
	FOREIGN KEY (id_medico) REFERENCES tb_medicos (id)
);

-- SENHA APLICAR HASH MD5
CREATE TABLE tb_agends_pronts (
  	id						INT NOT NULL AUTO_INCREMENT,
	id_prontuario			INT NOT NULL ,
	id_agendamento			INT NOT NULL ,

	PRIMARY KEY (id) ,
	FOREIGN KEY (id_prontuario) REFERENCES tb_prontuarios (id) ,
	FOREIGN KEY (id_agendamento) REFERENCES tb_agendamentos (id)
);

CREATE TABLE tb_anexos (
  	id						INT NOT NULL AUTO_INCREMENT,
	nome					VARCHAR(60) NOT NULL ,
	caminho					VARCHAR(30) NOT NULL ,
	id_agendamento			INT NOT NULL ,
	PRIMARY KEY (id) ,
	FOREIGN KEY (id_agendamento) REFERENCES tb_agendamentos (id)
);

insert into tb_paises (id, nome, sigla) values
	(1, 'Brasil','BRA'),
	(2, 'Argentina','ARG'),
	(3, 'Uruguai','URU'),
	(4, 'Paraguai','PAR');

insert into tb_estados (id, id_pais, nome, uf) values
	(1, 1, 'Acre', 'AC'),
	(2, 1, 'Alagoas', 'AL'),
	(3, 1, 'Amapá', 'AP'),
	(4, 1, 'Amazonas', 'AM'),
	(5, 1, 'Bahia', 'BA'),
	(6, 1, 'Ceará', 'VE'),
	(7, 1, 'Distrito Federal', 'DF'),
	(8, 1, 'Espírito Santo', 'ES'),
	(9, 1, 'Goiás', 'GO'),
	(10, 1, 'Maranhão', 'MA'),
	(11, 1, 'Mato Grosso', 'MT'),
	(12, 1, 'Mato Grosso do Sul', 'MS'),
	(13, 1, 'Minas Gerais', 'MG'),
	(14, 1, 'Pará', 'PA'),
	(15, 1, 'Paraíba', 'PB'),
	(16, 1, 'Paraná', 'PR'),
	(17, 1, 'Pernambuco', 'PE'),
	(18, 1, 'Piauí', 'PI'),
	(19, 1, 'Rio de Janeiro', 'RJ'),
	(20, 1, 'Rio Grande do Norte', 'RN'),
	(21, 1, 'Rio Grande do Sul', 'RS'),
	(22, 1, 'Rondônia', 'RO'),
	(23, 1, 'Roraima', 'RR'),
	(24, 1, 'Santa Catarina', 'SC'),
	(25, 1, 'São Paulo', 'SP'),
	(26, 1, 'Sergipe', 'SE'),
	(27, 1, 'Tocantins', 'TO');

insert into tb_cidades (id, id_estado, nome) values
	-- CIDADES DO ESTADO DO ACRE
	(1, 1, 'Acrelândia'),
	(2, 1, 'Assis Brasil'),
	(3, 1, 'Brasiléia'),
	(4, 1, 'Bujari'),
	(5, 1, 'Capixaba'),
	(6, 1, 'Cruzeiro do Sul'),
	(7, 1, 'Epitaciolândia'),
	(8, 1, 'Feijó'),
	(9, 1, 'Jordão'),
	(10, 1, 'Manoel Urbano'),
	(11, 1, 'Marechal Thaumaturgo'),
	(12, 1, 'Mâncio Lima'),
	(13, 1, 'Plácido de Castro'),
	(14, 1, 'Porto Acre'),
	(15, 1, 'Porto Walter'),
	(16, 1, 'Rio Branco'),
	(17, 1, 'Rodrigues Alves'),
	(18, 1, 'Santa Rosa do Purus'),
	(19, 1, 'Sena Madureira'),
	(20, 1, 'Senador Guiomard'),
	(21, 1, 'Tarauacá'),
	(22, 1, 'Xapuri'),
	-- CIDADES DO ESTADO DE ALAGOAS
	(23, 1, 'Santa Rosa'),
	-- CIDADES DO ESTADO DO AMAPÁ 
	(1, 1, 'Santa Rosa'),
	-- CIDADES DO ESTADO DE AMAZONAS
	(1, 1, 'Santa Rosa'),
	-- CIDADES DO ESTADO DA BAHIA
	(1, 1, 'Santa Rosa'),
	-- CIDADES DO ESTADO DO CEARÁ
	(1, 1, 'Santa Rosa'),
	-- CIDADES DO DISTRITO FEDERAL
	(1, 1, 'Santa Rosa'),
	-- CIDADES DO ESTADO DO ESPÍRITO SANTO
	(1, 1, 'Santa Rosa'),
	-- CIDADES DO ESTADO DE GOIÁS
	(1, 1, 'Santa Rosa'),
	-- CIDADES DO ESTADO DO MARANHÃO
	(1, 1, 'Santa Rosa'),
	-- CIDADES DO ESTADO DO MATO GROSSO
	(1, 1, 'Santa Rosa'),
	-- CIDADES DO ESTADO DO MATO GROSSO DO SUL
	(1, 1, 'Santa Rosa'),
	-- CIDADES DO ESTADO DE MINAS GERAIS
	(1, 1, 'Santa Rosa'),
	-- CIDADES DO ESTADO DO PARÁ
	(1, 1, 'Santa Rosa'),
	-- CIDADES DO ESTADO DA PARAÍBA
	(1, 1, 'Santa Rosa'),
	-- CIDADE DO ESTADO DO PARANÁ
	(1, 1, 'Santa Rosa'),
	-- CIDADES DO ESTADO DO PERNAMBUCO
	(1, 1, 'Santa Rosa'),
	-- CIDADES DO ESTADO DO PIAUÍ
	-- CIDADES DO ESTADO DO RIO DE JANEIRO
	-- CIDADES DO ESTADO DO RIO GRANDE DO NORTE
	-- CIDADES DO ESTADO DO RIO GRANDE DO SUL
	-- CIDADES DO ESTADO DE RONDÔNIA
	-- CIDADES DO ESTADO DE RORAIMA
	-- CIDADES DO ESTADO DE SANTA CATARINA
	-- CIDADES DO ESTADO DE SÃO PAULO
	-- CIDADES DO ESTADO DE SERGIPE
	-- CIDADES DO ESTADO DE TOCANTINS

