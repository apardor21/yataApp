<!DOCTYPE html>
<html>
<head>
    <title>Login - yataApp</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
</head>

<body class="blue lighten-5">

<div class="container" style="margin-top:100px; max-width:400px;">
    <div class="card">
        <div class="card-content">
            <span class="card-title center-align">yataApp</span>

            <?php
            
            if (isset($_SESSION["error"])) {
                echo "<p class='red-text center'>" . $_SESSION["error"] . "</p>";
                unset($_SESSION["error"]);
            }
            ?>

            <form method="POST" action="index.php?route=login">

                <div class="input-field">
                    <input type="text" name="username" required>
                    <label>Usuario</label>
                </div>

                <div class="input-field">
                    <input type="password" name="password" required>
                    <label>Contraseña</label>
                </div>

                <div class="center">
                    <button class="btn blue waves-effect waves-light" type="submit">
                        Iniciar Sesión
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
