
$(document).ready(function () { 
    Swal.fire({
        title: "Perfecto",
        html: '<h4><strong> Su compra se ha procesado correctamente</strong></h4>',
        icon: "success",
        padding: '1rem',
        //timer: 5000,
        //timerProgressBar: true,
        position: 'center',
        allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false
    });

    $("button").click(function () {
        document.location.href="../CONTROLADOR/TiendaControlador.php?op=2 "; 
        parent.jQuery.fancybox.close(); 
       
    }); 

});

