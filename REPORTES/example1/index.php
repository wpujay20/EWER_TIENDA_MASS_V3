<?php

function getPDF($ListaDetalle) {
 
$NombreApe=$ListaDetalle[0]["per_nombre"] .''. $ListaDetalle[0]["per_apellido"];
$correo=$ListaDetalle[0]["per_email"];
$fechaVenta=$ListaDetalle[0]["pedido_fecha"];
$direction=$ListaDetalle[0]["per_direccion"];
    
    
    

    $plantilla = ' <body>   
    <header class="clearfix">
      <div id="logo" >     
                 
      </div>
      
      <h1>TIENDA MASS</h1>
      
      <div id="company" class="clearfix">
        <div>TIENDA MASS</div>
        <div>Villa el Salvador,<br /> Mariategui</div>
        <div>(01) 7858969</div>
        <div><a href="tiendamass@gmail.com">tiendamass@gmail.com</a></div>
      </div>
      <div id="project">
        <div><span>DATOS DEL CLIENTE</span> </div>
        <div><span>NOMBRE Y EPELLIDO: </span> '.$NombreApe.' </div>
        <div><span>DIRECCIÓN:         </span> '.$direction.'</div>
        <div><span>EMAIL:             </span> '.$correo.'</div>
        <div><span>FECHA DE VENTA:    </span>'.$fechaVenta.' </div>
         
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">CANT.</th>
            <th class="desc">DESCRIPCIÓN</th>
            <th>PRECIO UNT. </th>            
            <th>SUBTOTAL</th>
          </tr>          
        </thead>
        <tbody>';
    $total = 0;
    foreach ($ListaDetalle as $lista) {
        $plantilla .= ' <tr>
            <td class="service">' . $lista["det_pedido_cantidad"] . '</td>
            <td class="desc">' . $lista["pro_nombre"] . '</td>
            <td class="unit">S/. ' . $lista["pro_precio"] . '</td>
            <td class="total"> S/. ' . number_format($lista["det_pedido_cantidad"] * $lista["pro_precio"], 2) . '</td>         
          </tr>          
          ';
        $total = $total + ($lista["det_pedido_cantidad"] * $lista["pro_precio"]);
    }
    $plantilla .= '
                    
          <tr>
            <td colspan="3" class="grand total">TOTAL</td>
            <td class="grand total">S/. ' . number_format($total, 2) . '</td>
          </tr>
         
        </tbody>
      </table>
      <div id="notices">
        <div>NOTICIA:</div>
        <div class="notice">Gracias por su compra.</div>
      </div>
    </main>
    <footer>
    
    </footer>
  </body>';

    return $plantilla;
}
?>
 