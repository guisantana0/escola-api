CREATE TABLE escola.escola (
	id INT auto_increment NOT NULL,
	nome varchar(100) NULL,
	endereco varchar(255) NULL,
	data_cadastro DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
	situacao varchar(100) DEFAULT 'ATIVO' NOT NULL,
	CONSTRAINT escola_pk PRIMARY KEY (id)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8
COLLATE=utf8_general_ci;
