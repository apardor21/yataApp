document.addEventListener("DOMContentLoaded", function() {

    const modal = document.querySelectorAll('.modal');
    M.Modal.init(modal);

    cargarRecetas();

    document.getElementById("formReceta").addEventListener("submit", function(e) {
        e.preventDefault();

        const formData = new FormData(this);

        fetch("index.php?route=storeReceta", {
            method: "POST",
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                M.toast({html: "Receta guardada correctamente"});
                cargarRecetas();
                this.reset();
            }
        });
    });

});

function cargarRecetas() {

    fetch("index.php?route=getRecetas")
    .then(res => res.json())
    .then(data => {

        let tbody = document.querySelector("#tablaRecetas tbody");
        tbody.innerHTML = "";

        data.forEach(receta => {
            tbody.innerHTML += `
                <tr>
                    <td>${receta.id}</td>
                    <td>${receta.nombre_paciente}</td>
                    <td>${receta.cedula}</td>
                    <td>${receta.fecha}</td>
                    <td>${receta.medico}</td>
                </tr>
            `;
        });
    });
}


document.addEventListener("DOMContentLoaded", function () {

    // 🔹 Cargar diagnósticos
    fetch("index.php?action=diagnostico.listarTodo")
        .then(res => res.json())
        .then(data => {

            let tabla = document.getElementById("tablaDiagnosticos");
            tabla.innerHTML = "";

            data.forEach(d => {
                tabla.innerHTML += `
                    <tr>
                        <td>${d.id}</td>
                        <td>${d.nombre}</td>
                        <td>${d.medicamentos}</td>
                    </tr>
                `;
            });
        });

    // 🔹 Cargar recetas
    fetch("index.php?action=receta.listar")
        .then(res => res.json())
        .then(data => {

            let tabla = document.getElementById("tablaRecetas");
            tabla.innerHTML = "";

            data.forEach(r => {
                tabla.innerHTML += `
                    <tr>
                        <td>${r.id}</td>
                        <td>${r.fecha}</td>
                        <td>${r.diagnostico}</td>
                        <td>${r.medicamentos}</td>
                    </tr>
                `;
            });
        });

});
