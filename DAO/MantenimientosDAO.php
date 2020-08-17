<?php

require_once '../BEAN/ProductosBean.php';
require_once '../UTILS/ConexionBD.php';
require_once '../BEAN/PersonaBean.php';
require_once '../BEAN/MarcaBean.php';
require_once '../BEAN/CategoriaBean.php';
require_once '../BEAN/UsuarioBean.php';

class MantenimientosDAO {

    public function ListarProductosCompletos() {
        try {
            $instanciacompartida = ConexionBD::getInstance();
            $sql = "SELECT * FROM producto as p inner join categoria as c on p.ID_categoria = c.ID_categoria "
                    . "INNER JOIN marca as m ON p.ID_marca=m.ID_marca ORDER by ID_producto;";

            $res = $instanciacompartida->ejecutar($sql);
            $lista = $instanciacompartida->obtener_filas($res);
            $instanciacompartida->setArray(null);

            return $lista;
        } catch (Exception $ex) {
            echo $ex->getTraceAsString() . "ERROR EN LA LINEA : " . $ex->getLine() . " " . $ex->getMessage();
        }
    }

    public function ActualizarProductos(ProductosBean $objProductoBean) {
        try {
            $instanciacompartida = ConexionBD::getInstance();
            $sql = "UPDATE producto as p set p.pro_nombre = '$objProductoBean->pro_nombre' , p.pro_precio =$objProductoBean->pro_precio ,"
                    . " p.pro_stock=$objProductoBean->pro_stock, p.pro_descripcion ='$objProductoBean->pro_descripcion', p.ID_marca =$objProductoBean->ID_marca, "
                    . "p.ID_categoria =$objProductoBean->ID_categoria  WHERE p.ID_producto=$objProductoBean->ID_producto;";

            $estado = $instanciacompartida->EjecutarConEstado($sql);


            return $estado;
        } catch (Exception $ex) {
            echo $ex->getTraceAsString() . "ERROR EN LA LINEA : " . $ex->getLine() . " " . $ex->getMessage();
        }
    }

    public function ActualizarMarca(MarcaBean $objMarcaBean) {
        try {
            $instanciacompartida = ConexionBD::getInstance();
            $sql = "UPDATE marca as M set M.marca_nombre = '$objMarcaBean->marca_nombre' ,M.marca_descripcion ='$objMarcaBean->marca_descripcion'  WHERE M.ID_marca=$objMarcaBean->ID_marca;";

            $estado = $instanciacompartida->EjecutarConEstado($sql);


            return $estado;
        } catch (Exception $ex) {
            echo $ex->getTraceAsString() . "ERROR EN LA LINEA : " . $ex->getLine() . " " . $ex->getMessage();
        }
    }

    public function ActualizarCategoria(CategoriaBean $objCategoriaBean) {
        try {
            $instanciacompartida = ConexionBD::getInstance();
            $sql = "UPDATE categoria as C set C.cat_nombre = '$objCategoriaBean->cat_nombre' ,C.cat_descripcion ='$objCategoriaBean->cat_descripcion'  WHERE C.ID_categoria=$objCategoriaBean->ID_categoria;";

            $estado = $instanciacompartida->EjecutarConEstado($sql);


            return $estado;
        } catch (Exception $ex) {
            echo $ex->getTraceAsString() . "ERROR EN LA LINEA : " . $ex->getLine() . " " . $ex->getMessage();
        }
    }

    public function EliminarProductos($id) {
        try {

            $instanciacompartida = ConexionBD::getInstance();
            $sql = "DELETE FROM producto WHERE ID_producto = $id";
            $estado = $instanciacompartida->EjecutarConEstado($sql);

            return $estado;
        } catch (Exception $ex) {
            echo $ex->getTraceAsString() . "ERROR EN LA LINEA : " . $ex->getLine() . " " . $ex->getMessage();
        }
    }

    public function InsertarProductos(ProductosBean $objProductosBean) {
        try {

            
            $instanciacompartida = ConexionBD::getInstance();
                 $sql="INSERT INTO producto (pro_nombre, pro_precio, pro_stock, pro_descripcion, pro_imagen, ID_marca, ID_categoria) VALUES "
                     . "('$objProductosBean->pro_nombre',$objProductosBean->pro_precio,$objProductosBean->pro_stock,'$objProductosBean->pro_descripcion', $objProductosBean->ID_marca,$objProductosBean->ID_categoria);";
 
            $estado = $instanciacompartida->EjecutarConEstado($sql);
          
            return $estado;
        } catch (Exception $ex) {
        }
    }

    public function ListarCategoriasCompletos() {
        try {
            $instanciacompartida = ConexionBD::getInstance();
            $sql = "SELECT * FROM categoria";

            $res = $instanciacompartida->ejecutar($sql);
           
            $lista = $instanciacompartida->obtener_filas($res);
             $instanciacompartida->setArray(null);
           

           
        } catch (Exception $ex) {
            
        }
        return $lista; 
    }

    public function InsertarCategoria(CategoriaBean $objCategoriaBean) {
        try {

            $instanciacompartida = ConexionBD::getInstance();
            $sql = "INSERT INTO categoria(cat_nombre,cat_descripcion) "
                    . "VALUES ('$objCategoriaBean->cat_nombre','$objCategoriaBean->cat_descripcion');";

            $estado = $instanciacompartida->EjecutarConEstado($sql);
           $instanciacompartida->setArray(null);

            return $estado;
        } catch (Exception $ex) {
            echo $ex->getTraceAsString() . "ERROR EN LA LINEA : " . $ex->getLine() . " " . $ex->getMessage();
        }
    }

    public function ListarMarcasCompletos() {
        try {
            $instanciacompartida = ConexionBD::getInstance();
            $sql = "SELECT * FROM marca";

            $res = $instanciacompartida->ejecutar($sql);
            $lista = $instanciacompartida->obtener_filas($res);
            // $instanciaCompartida->setArray(null);

            return $lista;
        } catch (Exception $ex) {
            echo $ex->getTraceAsString() . "ERROR EN LA LINEA : " . $ex->getLine() . " " . $ex->getMessage();
        }
    }

    public function InsertarMarca(MarcaBean $objMarcaBean) {
        try {

            $instanciacompartida = ConexionBD::getInstance();
            $sql = "INSERT INTO marca(marca_nombre,marca_descripcion) "
                    . "VALUES ('$objMarcaBean->marca_nombre','$objMarcaBean->marca_descripcion');";

            $estado = $instanciacompartida->EjecutarConEstado($sql);

            return $estado;
        } catch (Exception $ex) {
            echo $ex->getTraceAsString() . "ERROR EN LA LINEA : " . $ex->getLine() . " " . $ex->getMessage();
        }
    }

    //





    public function EliminarMarca($id) {
        try {

            $instanciacompartida = ConexionBD::getInstance();
            $sql = "DELETE FROM marca WHERE ID_marca = $id";
            $estado = $instanciacompartida->EjecutarConEstado($sql);

            return $estado;
        } catch (Exception $ex) {
            echo $ex->getTraceAsString() . "ERROR EN LA LINEA : " . $ex->getLine() . " " . $ex->getMessage();
        }
    }

    public function EliminarCategoria($id) {
        try {

            $instanciacompartida = ConexionBD::getInstance();
            $sql = "DELETE FROM categoria WHERE ID_categoria = $id";
            $estado = $instanciacompartida->EjecutarConEstado($sql);

            return $estado;
        } catch (Exception $ex) {
            echo $ex->getTraceAsString() . "ERROR EN LA LINEA : " . $ex->getLine() . " " . $ex->getMessage();
        }
    }

    public function EliminarPersona($id) {


        try {

            $instanciacompartida = ConexionBD::getInstance();
            $sql = "DELETE from persona where persona.id_persona = $id";
            $estado = $instanciacompartida->EjecutarConEstado($sql);

            return $estado;
        } catch (Exception $ex) {
            echo $ex->getTraceAsString() . "ERROR EN LA LINEA : " . $ex->getLine() . " " . $ex->getMessage();
        }
    }
    
    
public function EliminarUsuario($id) {

        try {

            $instanciacompartida = ConexionBD::getInstance();
            $sql = "DELETE from usuario where usuario.id_persona = $id";
            $estado = $instanciacompartida->EjecutarConEstado($sql);

            return $estado;
        } catch (Exception $ex) {
            echo $ex->getTraceAsString() . "ERROR EN LA LINEA : " . $ex->getLine() . " " . $ex->getMessage();
        }
    }
    
    
    public function ModififcarPersona_Usuario(UsuarioBean $objUsu, PersonaBean $objPersona) {

        try {

            $instanciacompartida = ConexionBD::getInstance();
            $sql = "UPDATE persona
                    INNER JOIN usuario ON persona.id_persona = usuario.id_persona
                    SET persona.per_nombre = '$objPersona->per_nombre', persona.per_apellido = '$objPersona->per_apellido'"
                    . ", persona.per_dni= $objPersona->per_dni, persona.per_email='$objPersona->per_email', persona.per_numero=$objPersona->per_numero,"
                    . " persona.per_direccion='$objPersona->per_direccion',usuario.usu_password='$objUsu->usu_password', usuario.usu_usuario='$objUsu->usu_usuario',"
                    . " usuario.id_tipo_usu=$objUsu->id_tipo_usuario
                    WHERE persona.id_persona=$objPersona->id_persona
                    ;";
            $estado = $instanciacompartida->EjecutarConEstado($sql);

            return $estado;
        } catch (Exception $ex) {
            echo $ex->getTraceAsString() . "ERROR EN LA LINEA : " . $ex->getLine() . " " . $ex->getMessage();
        }
    }

}
