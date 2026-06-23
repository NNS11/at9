-- Criação do banco de dados
CREATE DATABASE IF NOT EXISTS bdcrud;
USE bdcrud;

-- Criação da tabela usuarios
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    sexo CHAR(1) NOT NULL,
    fone VARCHAR(15) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);
