<?php

if (!isset($_SESSION)) {
    session_start();
}

require_once '../BEAN/PersonaBean.php';
require_once '../BEAN/UsuarioBean.php';
require_once '../DAO/UsuarioDAO.php';

$opciones = $_REQUEST['op']; 
switch ($opciones) {

    case 1: { //permite obtener los datos del registro de clientes
            unset($_SESSION['lista']);
            $objPersonaBean = new PersonaBean();
            $objPersona = new PersonaDAO();
            $objclienteDAO = new UsuarioDAO();
            $objUsuarioBean = new usuarioBean();
            
            $nombre = null;
            $apellido = null;

            if (isset($_REQUEST['nomb']) and isset($_REQUEST['apes'])) {
                $nombre = $_REQUEST['nomb'];
                $apellido = $_REQUEST['apes'];
            }
//            
            //  if ($_REQUEST['nombre']!=null && $_REQUEST['apellido']!=null) {
            if (is_null($nombre) && is_null($apellido)) {
                echo' <script src="../JAVASCRIPT/Jquery/jquery-1.6.3.min.js"></script>  
                         <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
                         <script src="../JAVASCRIPT/FalloRegistro.js"></script>';
            } else {

//                $nombre = $_REQUEST['nombre'];
//                $apellido = $_REQUEST['apellido'];
                $DNI = $_REQUEST['el_dni'];
                $email = $_REQUEST['e_mail'];   //el email sera el user del cliente
                $numero_cel = $_REQUEST['numero_cel'];
                $Direccion = $_REQUEST['Direccion'];
                $password = $_REQUEST['pass1'];

                $objPersonaBean->setPer_nombre($nombre);
                $objPersonaBean->setPer_apellido($apellido);
                $objPersonaBean->setPer_dni($DNI);
                $objPersonaBean->setPer_email($email);
                $objPersonaBean->setPer_numero($numero_cel);
                $objPersonaBean->setPer_direccion($Direccion);


                $estado = $objPersona->InsertarPersona($objPersonaBean);

                if ($estado) {

                    $id = $objclienteDAO->ObtenerIDMax();

                    $estado2 = $objclienteDAO->Agregar_cliente($id, $email, $password);


                    if ($estado2) {

                        echo' <script src="../JAVASCRIPT/Jquery/jquery-1.6.3.min.js"></script>  
                         <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
                         <script src="../JAVASCRIPT/UsuarioRegistrado.js"></script>';
                    }
                }
            }
            break;
        }

//****************************************************************************************************


    case 2: {

            $objUsuarioBean = new UsuarioBean();
            $objUsuarioDAO = new UsuarioDAO();

            $email = $_REQUEST['el_email'];
            $password = $_REQUEST['pass1'];

            $objUsuarioBean->setUsu_usuario($email);
            $objUsuarioBean->setUsu_password($password);
            UsuarioDAO::ValidarUsuario($objUsuarioBean);


//            $objUsuarioDAO->ValidarUsuario($objUsuarioBean);
        }
}
?>
