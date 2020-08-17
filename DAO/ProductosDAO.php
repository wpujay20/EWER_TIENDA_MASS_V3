<?php

require_once '../BEAN/ProductosBean.php';
require_once '../UTILS/ConexionBD.php';

class ProductosDAO {

       public function ListarCategorias() {
        try {

            $instanciacompartida = ConexionBD::getInstance();

            $sql2 = "SELECT * FROM categoria order by cat_nombre";

            $res = $instanciacompartida->ejecutar($sql2);
            $lista = $instanciacompartida->obtener_filas($res);
            
             $instanciacompartida->setArray(null);
            
            return $lista;
        } catch (Exception $ex) {
            
        }
    }

    public function ListarMarcas() {
        try {

            $instanciacompartida = ConexionBD::getInstance();

            $sql2 = "SELECT * FROM marca"; 
            $res = $instanciacompartida->ejecutar($sql2);
            $lista = $instanciacompartida->obtener_filas($res);
            
             $instanciacompartida->setArray(null);
             
        } catch (Exception $ex) {
            
        }
        return $lista;
    }

    public function ActualizarImagenDeProducto($id_producto, $nombre_img) {
        try {

            $sql = "UPDATE producto SET pro_imagen = '$nombre_img' WHERE ID_producto= $id_producto";

            $instanciacompartida = ConexionBD::getInstance();

            $estado = $instanciacompartida->EjecutarConEstado($sql);

            return $estado;
        } catch (Exception $ex) {

            echo $ex->getTraceAsString() . "ERROR EN LA LINEA : " . $ex->getLine() . " " . $ex->getMessage();
        }
    }



}
