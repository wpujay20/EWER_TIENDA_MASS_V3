<?php
require_once '../UTILS/ConexionBD.php';
require_once '../BEAN/PedidoBean.php';


class PedidoDAO
{

//INSERTAR PEDIDO DE LADO DEL CLIENTE
    public function InsertarPedidoCli(PedidoBean $objPedido)
    {
        try {
            $instanciaComp = ConexionBD::getInstance();
            $sql           = "INSERT INTO pedido (id_pedido, id_persona, pedido_monto, pedido_fecha, pedido_estado)"
                . " VALUES (NULL, '$objPedido->id_persona', '$objPedido->pedido_monto', Now(), 'Pendiente');";
            $estado = $instanciaComp->EjecutarConEstado($sql);

            return $estado;
        } catch (Exception $ex) {
            
        }
    }

    // OPTENER ID_VENTA
    public function ObtenerIDMaxPedido()
    {
        try {
            $instanciaCompartida = ConexionBD::getInstance();
            $sql                 = "SELECT max(id_pedido) as ID FROM pedido";
            $rs                  = $instanciaCompartida->ejecutar($sql);

            $id_obtenido = mysqli_fetch_assoc($rs);
            $id          = $id_obtenido['ID'];
            return $id;
        } catch (Exception $ex) {
            
        }
    }

    //Insertar detalle de pedido
    public function InsertarDetalleDePedido($id_producto, $id_pedido, $det_pedido_cantidad)
    {
        try {
            $instanciaComp = ConexionBD::getInstance();
            $sql           = "INSERT INTO detalle_pedido (id_det_pedido, id_producto, id_pedido, det_pedido_cantidad)"
                . " VALUES (NULL, '$id_producto ', '$id_pedido ', '$det_pedido_cantidad');";
            $estado = $instanciaComp->EjecutarConEstado($sql);

            return $estado;
        } catch (Exception $ex) {
            echo $ex->getTraceAsString() . "ERROR EN LA LINEA : " . $ex->getLine() . " " . $ex->getMessage();
        }
    }

    //Para modificar el stock cuando se realiza un pedido
    // esto es por ID
    public function ModificarStock($stockNew, $idpro)
    {

        try {
            $instanciaComp = ConexionBD::getInstance();
            $sql           = "UPDATE producto SET pro_stock = '$stockNew' WHERE producto.ID_producto = '$idpro';";
            $estado        = $instanciaComp->EjecutarConEstado($sql);
            return $estado;
        } catch (Exception $ex) {

        }
    }

    //LISTADO DE LOS PEDIDOS QUE HA REALIZADO EL CLIENTE
    //

    public function ListarPedidosRealizadosPorParteDelCliente($idPersona)
    {

//        $sql="SELECT pro.pro_imagen,pro.pro_nombre,pro.pro_precio, pe.pedido_estado FROM pedido as pe INNER JOIN detalle_pedido as dp
        // on pe.id_pedido = dp.id_pedido INNER JOIN producto as pro
        // on dp.id_producto = pro.ID_producto
        // WHERE pe.id_persona="32"";
        try {
            $instanciaComp = ConexionBD::getInstance();
            $sql           = "SELECT * FROM pedido pe WHERE pe.id_persona='$idPersona'; ";
            $res           = $instanciaComp->EjecutarConEstado($sql);
            $lista         = $instanciaComp->obtener_filas($res);

            return $lista;
        } catch (Exception $ex) {

        }
    }

    public function ListarDetallePedidoPorID($IDPEDIDO)
    {
        /**
         * $sql = "SELECT * FROM persona as perso INNER JOIN pedido as pe on perso.id_persona = pe.id_persona INNER JOIN detalle_pedido as dp
        on pe.id_pedido = dp.id_pedido INNER JOIN producto as pro
        on dp.id_producto = pro.ID_producto
        WHERE dp.id_pedido='$idPedido' ";
         *
         *
         * * */
        try {
            $instanciaComp = ConexionBD::getInstance();
            $sql           = "SELECT * FROM persona as perso INNER JOIN pedido as pe on perso.id_persona = pe.id_persona INNER JOIN detalle_pedido as dp
        on pe.id_pedido = dp.id_pedido INNER JOIN producto as pro
        on dp.id_producto = pro.ID_producto
        WHERE dp.id_pedido=$IDPEDIDO ";
            
            $res   = $instanciaComp->EjecutarConEstado($sql);
            $lista = $instanciaComp->obtener_filas($res);
            
            return $lista;
        } catch (Exception $e) {

        }
    }

    public function ListarPedidos()
    {

        try {
            $instanciaComp = ConexionBD::getInstance();
            $sql           = "SELECT PED.id_pedido,PER.per_nombre,PER.per_email,PED.id_persona,PED.pedido_estado,PED.pedido_fecha FROM pedido AS PED INNER JOIN persona AS PER ON PED.id_persona=PER.id_persona";
            $res   = $instanciaComp->EjecutarConEstado($sql);
            $lista = $instanciaComp->obtener_filas($res);

            return $lista;
        } catch (Exception $e) {

        }
    }

    public function PedidoListo($IDPEDIDO)
    {
        try {
            $instanciaComp = ConexionBD::getInstance();
            $sql           = "UPDATE PEDIDO SET pedido_estado='Listo para recoger' WHERE id_pedido=$IDPEDIDO; ";
            $estado        = $instanciaComp->EjecutarConEstado($sql);
            return $estado;
        } catch (Exception $e) {

        }
    }

    public function PedidoEntregado($IDPEDIDO)
    {
        try {
            $instanciaComp = ConexionBD::getInstance();
            $sql           = "UPDATE PEDIDO SET pedido_estado='Entregado' WHERE id_pedido=$IDPEDIDO;";
            $estado        = $instanciaComp->EjecutarConEstado($sql);
            return $estado;
        } catch (Exception $x) {

        }
    }

    public function EmpacandoPedido($IDPEDIDO)
    {
        try {
            $instanciaComp = ConexionBD::getInstance();
            $sql           = "UPDATE PEDIDO SET pedido_estado='Empacando' WHERE id_pedido=$IDPEDIDO;";
            $estado        = $instanciaComp->EjecutarConEstado($sql);
            return $estado;
        } catch (Exception $e) {

        }
    }

}
