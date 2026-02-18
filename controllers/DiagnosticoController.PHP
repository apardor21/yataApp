<?php

require_once __DIR__ . "/../models/Diagnostico.php";

class DiagnosticoController {

    public function index() {
        require_once __DIR__ . "/../views/diagnosticos/listar.php";
    }

    public function getAll() {
        $model = new Diagnostico();
        echo json_encode($model->getAll());
    }

    public function store() {
        $model = new Diagnostico();

        $data = [
            ":nombre" => $_POST["nombre"],
            ":medicamentos" => $_POST["medicamentos"]
        ];

        echo json_encode(["success" => $model->create($data)]);
    }

    public function listar() {
    $model = new Diagnostico();
    $datos = $model->obtenerTodos();

    echo json_encode($datos);
}

}
