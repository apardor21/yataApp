<?php require_once __DIR__ . "/../layout/header.php"; ?>
<?php require_once __DIR__ . "/../layout/sidebar.php"; ?>

<h4>Gestión de Recetas</h4>

<div class="right-align">
    <a class="btn blue modal-trigger" href="#modalReceta">Nueva Receta</a>
</div>

<table id="tablaRecetas" class="striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Paciente</th>
            <th>Cédula</th>
            <th>Fecha</th>
            <th>Médico</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>

<!-- Modal -->
<div id="modalReceta" class="modal">
    <div class="modal-content">
        <h5>Nueva Receta</h5>

        <form id="formReceta">

            <div class="input-field">
                <input type="text" name="nombre_paciente" required>
                <label>Nombre Paciente</label>
            </div>

            <div class="input-field">
                <input type="text" name="cedula" required>
                <label>Cédula</label>
            </div>

            <div class="input-field">
                <input type="number" name="edad" required>
                <label>Edad</label>
            </div>

            <div class="input-field">
                <textarea name="diagnostico" class="materialize-textarea"></textarea>
                <label>Diagnóstico</label>
            </div>

            <div class="input-field">
                <textarea name="medicamentos" class="materialize-textarea"></textarea>
                <label>Medicamentos</label>
            </div>

            <div class="input-field">
                <textarea name="indicaciones" class="materialize-textarea"></textarea>
                <label>Indicaciones</label>
            </div>

            <div class="input-field">
                <input type="date" name="fecha" required>
            </div>

            <div class="input-field">
                <input type="text" name="medico" required>
                <label>Médico</label>
            </div>

            <button class="btn green" type="submit">Guardar</button>

        </form>
    </div>
</div>



<hr>
<script src="assets/js/recetas.js"></script>
<?php require_once __DIR__ . "/../layout/footer.php"; ?>
