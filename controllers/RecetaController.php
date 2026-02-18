<?php

require_once __DIR__ . "/../models/Receta.php";

class RecetaController {

    public function index() {
        require_once __DIR__ . "/../views/recetas/listar.php";
    }

    public function getRecetas() {

        $recetaModel = new Receta();
        echo json_encode($recetaModel->getAll());
    }

    public function store() {

        $recetaModel = new Receta();

        $data = [
            ":nombre_paciente" => $_POST["nombre_paciente"],
            ":cedula" => $_POST["cedula"],
            ":edad" => $_POST["edad"],
            ":diagnostico" => $_POST["diagnostico"],
            ":medicamentos" => $_POST["medicamentos"],
            ":indicaciones" => $_POST["indicaciones"],
            ":fecha" => $_POST["fecha"],
            ":medico" => $_POST["medico"]
        ];

        echo json_encode(["success" => $recetaModel->create($data)]);
    }

    public function listar() {

    $model = new Receta();
    $datos = $model->listarConDiagnostico();

    echo json_encode($datos);
}

}
