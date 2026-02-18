<ul id="slide-out" class="sidenav sidenav-fixed">
    <li>
        <div class="user-view  purple darken-1 white-text">
            <span class="name"><?= $_SESSION["username"]; ?></span>
            <span class="email"><?= $_SESSION["rol"]; ?></span>
        </div>
    </li>

    <li>
        <a href="index.php?route=dashboard">
            <i class="material-icons">dashboard</i>
            Dashboard
        </a>
    </li>

    <li>
        <a href="index.php?route=recetas">
            <i class="material-icons">description</i>
            Recetas Médicas
        </a>
    </li>

    <li>
    <a href="index.php?route=diagnosticos">
        <i class="material-icons">medical_services</i>
        Diagnósticos
    </a>
</li>

</ul>

<main class="container">
