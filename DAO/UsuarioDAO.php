
<?php
 
require_once '../BEAN/UsuarioBean.php';
require_once '../UTILS/ConexionBD.php';
require_once '../DAO/PersonaDAO.php';
echo' <script src="../JAVASCRIPT/Jquery/jquery-1.6.3.min.js"></script>  
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>';

class UsuarioDAO extends UsuarioBean {

    //LO QUE HACEMOS AQUI ES OBTNER UN ID MAXIMO DE LA TABLA PERSONA QUE SE OBTUVO DEL CASE:1 DEL CONTROLADOR DE REGISTRO Y LOGIN
    //ENTONCES AL AGREGAR UN NUEVO NUMERO EN LA TABLA CLIENTES SE RELACIONARA CON LA PERSONA ULTIMA AGREGADA


    public function ObtenerIDMax() {
        try {
            $instanciaCompartida = ConexionBD::getInstance();
            $sql = "SELECT max(ID_persona) as ID FROM persona";
            $rs = $instanciaCompartida->ejecutar($sql);

            $id_obtenido = mysqli_fetch_assoc($rs);
            $id = $id_obtenido['ID'];
            return $id;
        } catch (Exception $ex) {
            echo $ex->getTraceAsString() . "ERROR EN LA LINEA : " . $ex->getLine() . " " . $ex->getMessage();
        }
    }

    //LUEGO DE OBTNER EL ID MAXIMO, USAREMOS ESTE METODO PARA INSERTARLO EN LA TABLA CLIENTES Y ESTE RELACIONADO ASI CON LA TABLA PERSONAS  
    public function Agregar_cliente($idpersona, $correo, $pass) {
        try {

            $instanciaCompartida = ConexionBD::getInstance();

            $sql = "INSERT INTO usuario(id_persona,usu_usuario,usu_password,id_tipo_usu) VALUES ($idpersona,'$correo','$pass',1)";
            $estado = $instanciaCompartida->EjecutarConEstado($sql);

            return $estado;
        } catch (Exception $ex) {
            echo $ex->getTraceAsString() . "ERROR EN LA LINEA : " . $ex->getLine() . " " . $ex->getMessage();
        }
    }
    
     public function Agregar_usuario($idpersona, $correo, $pass, $id_tipo_usu) {
        try {

            $instanciaCompartida = ConexionBD::getInstance();

            $sql = "INSERT INTO usuario(id_persona,usu_usuario,usu_password,id_tipo_usu) VALUES ($idpersona,'$correo','$pass',$id_tipo_usu)";
            $estado = $instanciaCompartida->EjecutarConEstado($sql);

            return $estado;
        } catch (Exception $ex) {
            echo $ex->getTraceAsString() . "ERROR EN LA LINEA : " . $ex->getLine() . " " . $ex->getMessage();
        }
    }


    public function ValidarUsuario(UsuarioBean $objUsuarioBean) {


        try {
            $instanciacompartida = ConexionBD::getInstance();
            $sql = "SELECT * FROM usuario WHERE usu_usuario='$objUsuarioBean->usu_usuario'"
                    . " and usu_password='$objUsuarioBean->usu_password' and id_tipo_usu=1;";
            $res = $instanciacompartida->ejecutar($sql);
            $lista = $instanciacompartida->obtener_filas($res);
            $verificar = mysqli_affected_rows($instanciacompartida->getLink());

            if ($verificar > 0) {
                session_destroy();
                session_start();

                $_SESSION['id_usuario'] = $lista[0]['id_usuario'];
                $_SESSION['id_persona'] = $lista[0]['id_persona'];
                    $_SESSION['datos']= PersonaDAO::DatosPersonaID($_SESSION['id_persona']);
                

                //CREACION DE LOS DATOS VARIABLES  PARA LA SESION
                //NO GUARDAMOS EL SALDO EN UNA SESION PORQUE NECESTAREMOS TRABAJAR CON ESAS CIFRAS EN TODO MOMENTO

                echo ' <script src="../JAVASCRIPT/opciones.js"></script>  ';
            } else {
                echo ' <script src="../JAVASCRIPT/opcionesError.js"></script>  ';
            }
        } catch (Exception $ex) {
            echo $ex->getTraceAsString() . "ERROR EN LA LINEA : " . $ex->getLine() . " " . $ex->getMessage();
        }
    }

    // *----------********************************************** SECCION ADMIN *----------***********************************************----------**********************************************

    public function ValidarAdmin(UsuarioBean $objUsuarioBean) {
        try {
            $instanciacompartida = ConexionBD::getInstance();
            $sql = "SELECT * FROM usuario WHERE usu_usuario='$objUsuarioBean->usu_usuario'"
                    . " and usu_password='$objUsuarioBean->usu_password' and id_tipo_usu=2;";
            $res = $instanciacompartida->ejecutar($sql);
            $lista = $instanciacompartida->obtener_filas($res);
            $verificar = mysqli_affected_rows($instanciacompartida->getLink());

            if ($verificar > 0) {
                

                $_SESSION['id_usuario'] = $lista[0]['id_usuario'];
                $_SESSION['id_persona'] = $lista[0]['id_persona'];

                //CREACION DE LOS DATOS VARIABLES  PARA LA SESION
                //NO GUARDAMOS EL SALDO EN UNA SESION PORQUE NECESTAREMOS TRABAJAR CON ESAS CIFRAS EN TODO MOMENTO

                echo ' <script src="../JAVASCRIPT/LoginCorrecto(Admin).js"></script>  ';
            } else {
                echo ' <script src="../JAVASCRIPT/LoginError(Admin).js"></script>';
            }
        } catch (Exception $ex) {
            echo $ex->getTraceAsString() . "ERROR EN LA LINEA : " . $ex->getLine() . " " . $ex->getMessage();
        }
    }

    public function ListarPersonasMant() {
        
        try {
            $instanciacompartida = ConexionBD::getInstance();
            $sql = "SELECT * FROM tipousuario as tip INNER JOIN usuario as usu on tip.id_tipo_usu=usu.id_tipo_usu INNER JOIN persona as per on per.id_persona=usu.id_persona";
            $res = $instanciacompartida->ejecutar($sql);
            $lista = $instanciacompartida->obtener_filas($res);
             $instanciacompartida->setArray(null);
        } catch (Exception $ex) {
            echo $ex->getTraceAsString() . "ERROR EN LA LINEA : " . $ex->getLine() . " " . $ex->getMessage();
        }
 
        return $lista;
    }
    
     public function ListarTiposUsuario() {

        try {

            $instanciacompartida = ConexionBD::getInstance();
            $sql2 = "SELECT * FROM tipousuario";

            $res = $instanciacompartida->ejecutar($sql2);
            $lista = $instanciacompartida->obtener_filas($res);
             $instanciacompartida->setArray(null);
            
        } catch (Exception $ex) {
            
        }
        return $lista;
    }
    
    
         public function InsertarPersona(PersonaBean $objPersonaBean){
        try {
        
            $instanciacompartida = ConexionBD::getInstance();
            $sql = "INSERT INTO persona(per_nombre,per_apellido,per_dni,per_email,per_numero,per_direccion)"
                    . "VALUES ('$objPersonaBean->per_nombre','$objPersonaBean->per_apellido',$objPersonaBean->per_dni,'$objPersonaBean->per_email',$objPersonaBean->per_numero,'$objPersonaBean->per_direccion');";
            
            $estado = $instanciacompartida->EjecutarConEstado($sql);

            return $estado;
            
        } catch (Exception $ex) {
            echo $ex->getTraceAsString() . "ERROR EN LA LINEA : " . $ex->getLine() . " " . $ex->getMessage();
        }
    }

}
