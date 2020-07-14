$(document).ready(function () {

 
        Swal.fire({
            title: "Error",
            html: '<h4><strong> Error al registrar usuario <br> Asegurese de validar su DNI </strong></h4>',
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
            document.location.href="../RegistraCliente.php";
    });


});