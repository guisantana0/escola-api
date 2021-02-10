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


CREATE TABLE escola.turma (
	serie INT DEFAULT 1 NOT NULL COMMENT 'Série do nível da turma',
	ano INT DEFAULT 0 NULL COMMENT 'Ano em que é lecionado a turma',
	nivel_ensino varchar(100) DEFAULT 'NÍVEL DE ENSINO NÃO INFORMADO' NOT NULL COMMENT 'NÍVEL DE ENSINO DA TURMA',
	turno varchar(100) DEFAULT 'Turno não informado' NOT NULL COMMENT 'Especifica o período do dia ou noite da turma',
	escola_id INT NOT NULL COMMENT 'Identificação da escola',
	id INT auto_increment NOT NULL COMMENT 'Número de identificação da turma.',
	data_cadastro datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ,
	CONSTRAINT turma_pk PRIMARY KEY (id),
	CONSTRAINT turma_fk FOREIGN KEY (escola_id) REFERENCES escola.escola(id)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8
COLLATE=utf8_general_ci;


CREATE TABLE escola.aluno (
	id INT auto_increment NOT NULL COMMENT 'número de identificação do aluno no banco de dados',
	nome varchar(255) DEFAULT 'NÃO INFORMADO' NOT NULL COMMENT 'Nome do aluno',
	email varchar(100) DEFAULT 'NÃO INFORMADO' NOT NULL,
	data_nascimento DATE NOT NULL COMMENT 'Data de nascimento do aluno',
	situacao varchar(100) DEFAULT 'ATIVO' NOT NULL COMMENT 'Situação do aluno no banco de dados.',
	data_cadastro DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT 'momento do cadastro do aluno',
	genero ENUM('FEMININO','MASCULINO','NÃO INFORMADO') DEFAULT 'NÃO INFORMADO' NOT NULL COMMENT 'Informação sobre o gênero do aluno',
	CONSTRAINT aluno_pk PRIMARY KEY (id)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8
COLLATE=utf8_general_ci;


CREATE TABLE escola.turma_aluno (
	id INT auto_increment NOT NULL COMMENT 'identificação do vínculo da turma com o aluno',
	turma_id INT NOT NULL COMMENT 'indentificação da turma',
	aluno_id INT NOT NULL COMMENT 'identificação do aluno',
	data_cadastro datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ,
	CONSTRAINT turma_aluno_pk PRIMARY KEY (id),
	CONSTRAINT turma_aluno_fk FOREIGN KEY (turma_id) REFERENCES escola.turma(id),
	CONSTRAINT turma_aluno_fk_1 FOREIGN KEY (aluno_id) REFERENCES escola.aluno(id)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8
COLLATE=utf8_general_ci;


