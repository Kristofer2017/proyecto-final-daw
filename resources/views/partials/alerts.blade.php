@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: @json(session('success'))
        });
    </script>
@elseif (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: '¡Error!',
            text: @json(session('error'))
        });
    </script>
@endif
