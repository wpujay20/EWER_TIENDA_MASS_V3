<?php

require_once '../BEAN/PersonaBean.php';
require_once '../UTILS/ConexionBD.php';

class PersonaDAO extends PersonaBean {

    //VIENDE DE INDEX.PHP
    public function ListarProductos() {
        try {
            $instanciacompartida = ConexionBD::getInstance();
            $sql = "SELECT * FROM PRODUCTO";
            $res = $instanciacompartida->ejecutar($sql);
            $lista = $instanciacompartida->obtener_filas($res);

            return $lista;
        } catch (Exception $ex) {
            echo $ex->getTraceAsString() . "ERROR EN LA LINEA : " . $ex->getLine() . " " . $ex->getMessage();
        }
    }

    //VIENE DE MENU_COMPRAS.PHP_ LO QUE QUEREMOS ES TENER LOS DATOS ESPECIFICOS DEL PRODUCTO

    public function ListarPorProductosPorID($id) {

        try {
            $instanciacompartida = ConexionBD::getInstance();
            $sql = " SELECT * FROM producto as p inner join categoria as c on p.ID_categoria = c.ID_categoria INNER JOIN 
marca as m ON p.ID_marca=m.ID_marca WHERE ID_producto='$id';";
            $res = $instanciacompartida->ejecutar($sql);
            $lista = $instanciacompartida->obtener_filas($res);

            return $lista;
        } catch (Exception $ex) {
            echo $ex->getTraceAsString() . "ERROR EN LA LINEA : " . $ex->getLine() . " " . $ex->getMessage();
        }
    }

    public function InsertarPersona(PersonaBean $objPersonaBean) {
        try {

            $instanciaCompartida = ConexionBD::getInstance();

            $sql = "INSERT INTO persona(per_nombre,per_apellido,per_DNI,per_email,per_numero,per_direccion) "
                    . "VALUES ('$objPersonaBean->per_nombre','$objPersonaBean->per_apellido',$objPersonaBean->per_dni,'$objPersonaBean->per_email',$objPersonaBean->per_numero,'$objPersonaBean->per_direccion')";

            $estado = $instanciaCompartida->EjecutarConEstado($sql);


            return $estado;
        } catch (Exception $ex) {
            echo $ex->getTraceAsString() . "ERROR EN LA LINEA : " . $ex->getLine() . " " . $ex->getMessage();
        }
    }

}
