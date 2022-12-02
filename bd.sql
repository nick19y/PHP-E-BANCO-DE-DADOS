CREATE DATABASE festa_junina;
USE festa_junina;
CREATE TABLE contribuinte(
    idContribuinte INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(50),
    valor_contribuicao DECIMAL(10,2)
);