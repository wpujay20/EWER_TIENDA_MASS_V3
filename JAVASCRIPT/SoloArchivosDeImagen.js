
$(document).ready(function () {

    Swal.fire({
        title: "Error",
        html: '<h4><strong> Solo esta permitido archivos JPG, JPEG o PNG</strong></h4>',
        icon: "error",
        padding: '1rem',
        //timer: 5000,
        //timerProgressBar: true,
        position: 'center',
        allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false,
        stopKeydownPropagation: false
    });

    $("button").click(function () {
        document.location.href = "../CONTROLADOR/Mantenimiento_controlador.php?op=11";
    });


});
