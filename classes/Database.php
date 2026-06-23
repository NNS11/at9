<?php
class Database {
    private $host = "localhost";
    private $db_name = "bdcrud";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            // Conecta sem especificar o banco primeiro
            $this->conn = new PDO(
                "mysql:host=" . $this->host,
                $this->username,
                $this->password
            );
            // Cria o banco se não existir
            $this->conn->exec("CREATE DATABASE IF NOT EXISTS `" . $this->db_name . "` CHARACTER SET utf8 COLLATE utf8_general_ci");
            // Seleciona o banco
            $this->conn->exec("USE `" . $this->db_name . "`");
            // Cria a tabela se não existir
            $this->conn->exec("CREATE TABLE IF NOT EXISTS usuarios (
                id INT AUTO_INCREMENT PRIMARY KEY,
                nome VARCHAR(255) NOT NULL,
                sexo CHAR(1) NOT NULL,
                fone VARCHAR(15) NOT NULL,
                email VARCHAR(100) NOT NULL UNIQUE,
                senha VARCHAR(255) NOT NULL
            )");
        } catch (PDOException $exception) {
            echo "Erro de conexão: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>
