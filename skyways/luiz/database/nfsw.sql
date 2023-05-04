CREATE TABLE CADASTROS (
	ID BIGINT PRIMARY KEY AUTO_INCREMENT,
    EMAIL VARCHAR(150) NOT NULL UNIQUE,
    SENHA VARCHAR(255) NOT NULL,
    ADMINISTRADOR TINYINT(1) NOT NULL DEFAULT 0
);

CREATE TABLE PESSOAS (
	ID BIGINT PRIMARY KEY AUTO_INCREMENT,
    CADASTRO_ID BIGINT NULL,
    NOME VARCHAR(50) NOT NULL,
    SOBRENOME VARCHAR(50) NOT NULL,
    NASCIMENTO DATE NOT NULL,
    PAIS VARCHAR(3) NOT NULL DEFAULT 'BRA',
    ENDERECO VARCHAR(255) NULL,
    CPF VARCHAR(11) NULL UNIQUE,
    RG VARCHAR(9) NULL,
    CELULAR VARCHAR(50) NULL UNIQUE,
    ACOMPANHANTE BIGINT NULL,
    FOREIGN KEY (CADASTRO_ID) REFERENCES CADASTROS(ID),
    FOREIGN KEY (ACOMPANHANTE) REFERENCES CADASTROS(ID)
);

CREATE TABLE AEROPORTO (
    CODIGO VARCHAR(3) PRIMARY KEY,
    NOME VARCHAR(255) NOT NULL,
    LATITUDE FLOAT NOT NULL,
    LONGITUDE FLOAT NOT NULL
);

CREATE TABLE DISTANCIA (
    ID INT(2) PRIMARY KEY AUTO_INCREMENT,
    AEROPORTO_IDA CHAR(3) NOT NULL,
    AEROPORTO_VOLTA CHAR(3) NOT NULL,
    DISTANCIA_KM FLOAT NOT NULL,
    FOREIGN KEY (AEROPORTO_IDA) REFERENCES AEROPORTO(CODIGO),
    FOREIGN KEY (AEROPORTO_VOLTA) REFERENCES AEROPORTO(CODIGO)
);

INSERT INTO DISTANCIA(AEROPORTO_IDA, AEROPORTO_VOLTA, DISTANCIA_KM) VALUES
    ('GRU', 'SDU', 344),
    ('GRU', 'BSB', 851),
    ('GRU', 'FOR', 2337),
    ('SDU', 'BSB', 926),
    ('SDU', 'FOR', 2175),
    ('BSB', 'FOR', 1687);

