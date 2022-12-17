$('.formulario-eliminar').submit(function(e) {
    e.preventDefault();
    Swal.fire({
        title: '¿Estás seguro?',
        text: "Esta acción no tiene vuelta atrás.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: 'rgba(62, 141, 166, 1) ',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Si, eliminar!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            this.submit();
        }
    })
})
