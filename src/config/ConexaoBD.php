<?php

class ConexaoBD
{
    private $serverName = "localhost";
    private $userName = "root";
    private $password = "admin123";
    private $dbName = "praia_das_pulseiras";

    public function conectar()
    {
        try {
            $conn = new PDO("mysql:host={$this->serverName};dbname={$this->dbName}", $this->userName, $this->password);
            // Define o modo de erro do PDO para exceção
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}
