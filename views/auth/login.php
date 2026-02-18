<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>MedicalApp</title>

    <!-- Materialize -->
    <link rel="stylesheet" href="assets/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
        body {
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #4a148c, #8e24aa, #6a1b9a);
            background-size: 300% 300%;
            animation: gradientMove 8s ease infinite;
        }

        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .login-card {
            width: 400px;
            padding: 40px;
            border-radius: 20px;
            backdrop-filter: blur(10px);
            background: rgba(255,255,255,0.95);
            animation: fadeIn 0.8s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .app-title {
            font-weight: bold;
            color: #6a1b9a;
            margin-bottom: 5px;
        }

        .btn-purple {
            background-color: #6a1b9a;
            border-radius: 30px;
        }

        .btn-purple:hover {
            background-color: #4a148c;
        }

        .logo-circle {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: #6a1b9a;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 15px auto;
            color: white;
            font-size: 30px;
        }
    </style>
</head>

<body>

    <div class="login-card z-depth-4">

        <div class="center-align">

            <div class="logo-circle">
                <i class="material-icons">local_hospital</i>
            </div>

            <h5 class="app-title">MedicalApp los moñoño</h5>
            <p class="grey-text">Sistema de Gestión Médica</p>

        </div>
          <?php
            if (isset($_SESSION["error"])) {
                echo "<p class='red-text center'>" . $_SESSION["error"] . "</p>";
                unset($_SESSION["error"]);
            }
            ?>

         <form method="POST" action="index.php?route=login">

            <div class="input-field">
                <i class="material-icons prefix purple-text">person</i>
                <input type="text" name="usuario" id="usuario" required>
                <label for="usuario">Usuario</label>
            </div>

            <div class="input-field">
                <i class="material-icons prefix purple-text">lock</i>
                <input type="password" name="password" id="password" required>
                <label for="password">Contraseña</label>
                <span class="material-icons suffix" 
                      style="cursor:pointer;" 
                      onclick="togglePassword()">
                      visibility
                </span>
            </div>

            <div class="center">
                <button type="submit" 
                        class="btn btn-purple waves-effect waves-light" 
                        style="width:100%; margin-top:10px;">
                    Ingresar
                </button>
            </div>

        </form>

    </div>

    <script src="assets/js/materialize.min.js"></script>

    <script>
        function togglePassword() {
            const pass = document.getElementById("password");
            pass.type = pass.type === "password" ? "text" : "password";
        }
    </script>

</body>
</html>
