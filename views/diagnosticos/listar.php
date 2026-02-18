<?php require_once __DIR__ . "/../layout/header.php"; ?>
<?php require_once __DIR__ . "/../layout/sidebar.php"; ?>

<h4>Gestión de Diagnósticos</h4>

<div class="right-align" style="margin-bottom:20px;">
    <a class="btn blue modal-trigger" href="#modalDiagnostico">
        Nuevo Diagnóstico
    </a>
</div>

<table id="tablaDiagnosticos" class="striped highlight">
    <thead>
        <tr>
            <th>ID</th>
            <th>Diagnóstico</th>
            <th>Medicamentos</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>

<!-- Modal -->
<div id="modalDiagnostico" class="modal">
    <div class="modal-content">
        <h5>Nuevo Diagnóstico</h5>

        <form id="formDiagnostico">

            <div class="input-field">
                <input type="text" name="nombre" required>
                <label>Nombre del Diagnóstico</label>
            </div>

            <div class="input-field">
                <textarea name="medicamentos" 
                          class="materialize-textarea" 
                          required></textarea>
                <label>Medicamentos Asociados</label>
            </div>

            <button class="btn green" type="submit">
                Guardar
            </button>

        </form>
    </div>
</div>

<script src="assets/js/diagnosticos.js"></script>
<?php require_once __DIR__ . "/../layout/footer.php"; ?>
