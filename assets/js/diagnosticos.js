document.addEventListener("DOMContentLoaded", function() {

    const modals = document.querySelectorAll('.modal');
    M.Modal.init(modals);

    cargarDiagnosticos();

    document.getElementById("formDiagnostico")
    .addEventListener("submit", function(e) {

        e.preventDefault();

        const formData = new FormData(this);

        fetch("index.php?route=storeDiagnostico", {
            method: "POST",
            body: formData
        })
        .then(res => res.json())
        .then(data => {

            if (data.success) {
                M.toast({html: "Diagnóstico guardado correctamente"});
                cargarDiagnosticos();
                this.reset();
            }
        });
    });

});

function cargarDiagnosticos() {

    fetch("index.php?route=getDiagnosticos")
    .then(res => res.json())
    .then(data => {

        let tbody = document.querySelector("#tablaDiagnosticos tbody");
        tbody.innerHTML = "";

        data.forEach(d => {
            tbody.innerHTML += `
                <tr>
                    <td>${d.id}</td>
                    <td>${d.nombre}</td>
                    <td>${d.medicamentos}</td>
                </tr>
            `;
        });
    });
}
