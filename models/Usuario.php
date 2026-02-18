<?php

require_once __DIR__ . "/../config/Database.php";

class Usuario {

    private $conn;
    private $table = "usuarios";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function login($username) {

        $query = "SELECT * FROM {$this->table} WHERE username = :username LIMIT 1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function buscarPorUsuario($usuario)
{
    $sql = "SELECT * FROM usuarios WHERE username = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$usuario]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

}
