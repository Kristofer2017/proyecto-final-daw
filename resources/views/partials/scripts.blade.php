<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.3.2/js/dataTables.bootstrap5.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script src="{{ asset('libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('libs/sbadmin/js/sb-admin-2.js') }}"></script>

<script>
    @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: '{{ session('success') }}'
        });
    @elseif (session('error'))
        Swal.fire({
            icon: 'error',
            title: '¡Error!',
            text: '{{ session('error') }}'
        });
    @endif

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
</script>