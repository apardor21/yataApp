<?php

if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>yataApp - Panel Administrativo</title>

    <!-- Materialize -->
   <link rel="stylesheet" href="assets/css/materialize.min.css">
    <link rel="stylesheet" href="assets/css/style.css">


    <!-- Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
       nav {
    position: relative;
    z-index: 1000;
}

.sidenav {
    top: 64px; /* altura del navbar */
    height: calc(100% - 64px);
}

header, main, footer {
    padding-left: 300px;
}

@media only screen and (max-width : 992px) {
    header, main, footer {
        padding-left: 0;
    }
}

    </style>
</head>

<body>

<nav class=" purple darken-1 ">
    <div class="nav-wrapper">
        <a href="#" class="brand-logo center">yataApp</a>
        <ul class="right">
            <li><a href="#!"><?= $_SESSION["username"]; ?></a></li>
            <li><a href="index.php?route=logout">Salir</a></li>
        </ul>
    </div>
</nav>
