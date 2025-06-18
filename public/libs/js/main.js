let table = new DataTable('.dataTable', {
    language: {
        emptyTable: "No hay datos disponibles en la tabla",
        info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
        infoEmpty: "Mostrando 0 a 0 de 0 registros",
        search: "Buscar:",
        zeroRecords: "No se encontraron resultados",
        infoFiltered:   "(filtrado de _MAX_ resultados)",
        lengthMenu: "_MENU_ resultados por página",
        lengthLabels: { '-1': 'Todos' }
    },

    lengthMenu: [5, 10, 20, { label: 'All', value: -1 }]
});

function confirmar(id, tabla) {
    Swal.fire({
        title: "¿Esta seguro de eliminar el dato?",
        showCancelButton: true,
        confirmButtonText: "Eliminar",
        cancelButtonText: `No`
        }).then((result) => {
        
            if(result.isConfirmed) {
                location.href = "/"+tabla+"/eliminar/"+id;
            }
    });
}