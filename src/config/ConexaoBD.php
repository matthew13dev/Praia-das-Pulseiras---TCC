<?php

class ConexaoBD
{
    private $serverName = "db";
    private $userName = "root";
    private $password = "admin123";
    private $dbName = "praia_das_pulseiras";

    public function conectar()
    {
        try {
            $pdo = new PDO("mysql:host={$this->serverName};dbname={$this->dbName}", $this->userName, $this->password);
            // Define o modo de erro do PDO para exceção
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}
