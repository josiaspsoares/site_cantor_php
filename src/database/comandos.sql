CREATE DATABASE banco_site_do_cantor;
USE banco_site_do_cantor;

CREATE TABLE IF NOT EXISTS cantores
(
    id   int AUTO_INCREMENT,
    nome varchar(45) NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO cantores(id, nome)
VALUES (null, "Agnaldo Santana");

CREATE TABLE IF NOT EXISTS shows
(
    id        int AUTO_INCREMENT,
    id_cantor int         NOT NULL,
    data_show date        NOT NULL,
    hora_show time        NOT NULL,
    cidade    varchar(45) NOT NULL,
    ativo     bool        NOT NULL DEFAULT TRUE,
    PRIMARY KEY (id),
    FOREIGN KEY (id_cantor) REFERENCES cantores (id)
);

CREATE TABLE IF NOT EXISTS albuns
(
    id              int AUTO_INCREMENT,
    id_cantor       int         NOT NULL,
    nome            varchar(45) NOT NULL,
    data_lancamento date        NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (id_cantor) REFERENCES cantores (id)
);

CREATE TABLE IF NOT EXISTS musicas
(
    id        int AUTO_INCREMENT,
    id_cantor int          NOT NULL,
    id_album  int          NOT NULL,
    nome      varchar(45)  NOT NULL,
    caminho   varchar(150) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (id_cantor) REFERENCES cantores (id),
    FOREIGN KEY (id_album) REFERENCES albuns (id)
);


CREATE USER 'teste' IDENTIFIED BY '123456';
GRANT ALL PRIVILEGES ON *.* TO 'teste';
FLUSH PRIVILEGES;