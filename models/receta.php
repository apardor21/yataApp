<?php

require_once __DIR__ . "/../config/Database.php";

class Receta {

    private $conn;
    private $table = "recetas";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function getAll() {

        $query = "SELECT * FROM {$this->table} ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data) {

        $query = "INSERT INTO {$this->table}
            (nombre_paciente, cedula, edad, diagnostico, medicamentos, indicaciones, fecha, medico)
            VALUES
            (:nombre_paciente, :cedula, :edad, :diagnostico, :medicamentos, :indicaciones, :fecha, :medico)";

        $stmt = $this->conn->prepare($query);

        return $stmt->execute($data);
    }

    public function listarConDiagnostico() {

    $sql = "SELECT r.id,
                   r.fecha,
                   d.nombre AS diagnostico,
                   d.medicamentos
            FROM recetas r
            INNER JOIN diagnosticos d 
                ON r.diagnostico_id = d.id
            ORDER BY r.id DESC";

    $stmt = $this->conn->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

}
