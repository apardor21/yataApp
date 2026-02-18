<?php

session_start();

require_once "controllers/AuthController.php";
require_once "controllers/RecetaController.php";
require_once "controllers/DiagnosticoController.php";

$route = $_GET["route"] ?? "login";

/*
|--------------------------------------------------------------------------
| RUTAS PÚBLICAS
|--------------------------------------------------------------------------
| Solo estas rutas pueden ejecutarse sin sesión
*/
$publicRoutes = ["login"];

/*
|--------------------------------------------------------------------------
| PROTECCIÓN GLOBAL DE SESIÓN
|--------------------------------------------------------------------------
*/
if (!in_array($route, $publicRoutes) && !isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit;
}

switch ($route) {

    /*
    |--------------------------------------------------------------------------
    | LOGIN
    |--------------------------------------------------------------------------
    */
    case "login":
        $authController = new AuthController();

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $authController->login();
        } else {
            $authController->showLogin();
        }
        break;

    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */
    case "logout":
        (new AuthController())->logout();
        break;

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */
    case "dashboard":
        require_once "views/dashboard.php";
        break;

    /*
    |--------------------------------------------------------------------------
    | RECETAS
    |--------------------------------------------------------------------------
    */
    case "recetas":
        (new RecetaController())->index();
        break;

    case "getRecetas":
        (new RecetaController())->getRecetas();
        break;

    case "storeReceta":
        (new RecetaController())->store();
        break;

    /*
    |--------------------------------------------------------------------------
    | DIAGNÓSTICOS
    |--------------------------------------------------------------------------
    */
    case "diagnosticos":
        (new DiagnosticoController())->index();
        break;

    case "getDiagnosticos":
        (new DiagnosticoController())->getAll();
        break;

    case "storeDiagnostico":
        (new DiagnosticoController())->store();
        break;
 /*
    |--------------------------------------------------------------------------
    | LISTAR DIAGNÓSTICOS
    |--------------------------------------------------------------------------
    */
        case 'diagnostico.listar':
    $controller = new DiagnosticoController();
    $controller->getAll();
break;


      case 'diagnostico.listarTodo':
    $controller = new DiagnosticoController();
    $controller->listarTodo();
break;

case 'receta.listar':
    $controller = new RecetaController();
    $controller->listar();
break;
      

    /*
    |--------------------------------------------------------------------------
    | DEFAULT
    |--------------------------------------------------------------------------
    */
    default:
        echo "Ruta no encontrada";
        break;
}
