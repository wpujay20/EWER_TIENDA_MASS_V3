



function cancelarPago() {
 
    $("document").ready(function () {


        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger',
                padding: '3rem'
            },
            buttonsStyling: false
        });

        swalWithBootstrapButtons.fire({
            title: '¿Realmente Quiere Cancelar su Pago?',
            text: "Se borrarán todos los productos seleccionados",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si, quiero hacerlo',
            cancelButtonText: 'No, Cancelar!',
            reverseButtons: true
            
        }).then((result) => {
            if (result.value) {     /* En caso se eliga si quiero borraralo */
                swalWithBootstrapButtons.fire(
                        'Pago Cancelado!',                         
                        );
                $("button").click(function () {
                    document.location.href = "../CONTROLADOR/TiendaControlador.php?op=10";
                });

            } else if (
                    /* En caso se eliga no quiero borraralo */
                    result.dismiss === Swal.DismissReason.cancel
                    ) {
                swalWithBootstrapButtons.fire(
                        'Su pago no se Canceló',                       
                        );
 
            }
        });
    });



}




