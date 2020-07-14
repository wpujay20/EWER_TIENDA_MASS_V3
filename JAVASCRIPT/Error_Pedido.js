$(document).ready(function () {

 
        Swal.fire({
            title: "Error",
            html: '<h4><strong> Error ! \n Algo salio mal </strong></h4>',
            icon: "error",
            padding: '1rem',
            //timer: 5000,
            //timerProgressBar: true,
            position: 'center',
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false
        });
        
        $("button").click(function () {
            document.location.href="../VISTAS/MANTENIMIENTOS/PedidosMantenimientos.php";
    });
    

});
