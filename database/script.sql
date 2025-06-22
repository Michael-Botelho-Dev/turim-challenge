CREATE DATABASE familia_db;

USE familia_db;

CREATE TABLE pessoas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL
);

CREATE TABLE filhos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    pessoa_id INT,
    FOREIGN KEY (pessoa_id) REFERENCES pessoas(id)
);