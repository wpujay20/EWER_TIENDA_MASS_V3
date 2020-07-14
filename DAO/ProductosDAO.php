<?php

require_once '../BEAN/ProductosBean.php';
require_once '../UTILS/ConexionBD.php';

class ProductosDAO {

    public function ListarCategorias() {
        try {

            $cn = mysqli_connect("localhost", "root", "", "bdmass");
            mysqli_set_charset($cn, "utf8");
            $sql2 = "SELECT * FROM categoria order by cat_nombre";

            $res = mysqli_query($cn, $sql2);
            while ($row = mysqli_fetch_assoc($res)) {
                $lista[] = $row;
            }
            return $lista;
        } catch (Exception $ex) {

            echo $ex->getTraceAsString() . "ERROR EN LA LINEA : " . $ex->getLine() . " " . $ex->getMessage();
        } finally {
            mysqli_close($cn);
        }
    }

    public function ListarMarcas() {
        try {

            $cn = mysqli_connect("localhost", "root", "", "bdmass");
            mysqli_set_charset($cn, "utf8");
            $sql2 = "SELECT * FROM marca";

            $res = mysqli_query($cn, $sql2);
            while ($row = mysqli_fetch_assoc($res)) {
                $lista[] = $row;
            }
            return $lista;
        } catch (Exception $ex) {

            echo $ex->getTraceAsString() . "ERROR EN LA LINEA : " . $ex->getLine() . " " . $ex->getMessage();
        } finally {
            mysqli_close($cn);
        }
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
