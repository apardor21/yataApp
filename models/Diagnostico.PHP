<?php

require_once __DIR__ . "/../config/Database.php";

class Diagnostico {

    private $conn;
    private $table = "diagnosticos";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function getAll() {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table}");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data) {

        $query = "INSERT INTO {$this->table} (nombre, medicamentos)
                  VALUES (:nombre, :medicamentos)";

        $stmt = $this->conn->prepare($query);
        return $stmt->execute($data);
    }

    public function obtenerTodos() {
    $sql = "SELECT * FROM diagnosticos";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

}
