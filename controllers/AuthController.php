<?php

require_once __DIR__ . "/../models/Usuario.php";

class AuthController {

    public function showLogin() {
        require_once __DIR__ . "/../views/auth/login.php";
    }

    public function login() {

        session_start();

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $username = trim($_POST["username"]);
            $password = trim($_POST["password"]);

            $usuarioModel = new Usuario();
            $usuario = $usuarioModel->login($username);

            if ($usuario && password_verify($password, $usuario["password"])) {

                $_SESSION["user_id"] = $usuario["id"];
                $_SESSION["username"] = $usuario["username"];
                $_SESSION["rol"] = $usuario["rol"];

                header("Location: index.php?route=dashboard");
                exit;

            } else {
                $_SESSION["error"] = "Usuario o contraseña incorrectos";
                header("Location: index.php");
                exit;
            }
        }
    }

    public function logout() {

        session_start();
        session_destroy();

        header("Location: index.php");
        exit;
    }
}
