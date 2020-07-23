<?php

function getPDF($ListaDetalle) {

    $plantilla = ' <body>
    <header class="clearfix">
      <div id="logo" >
            <img src="logo_1.png" alt=""/>
        <img src="logo.png" alt=""/>  
                 
      </div>
      
      <h1>TIENDA MASS</h1>
      
      <div id="company" class="clearfix">
        <div>Company Name</div>
        <div>455 Foggy Heights,<br /> AZ 85004, US</div>
        <div>(602) 519-0450</div>
        <div><a href="mailto:company@example.com">company@example.com</a></div>
      </div>
      <div id="project">
        <div><span>PROJECT</span> Website development</div>
        <div><span>CLIENT</span> John Doe</div>
        <div><span>ADDRESS</span> 796 Silver Harbour, TX 79273, US</div>
        <div><span>EMAIL</span> <a href="mailto:john@example.com">john@example.com</a></div>
        <div><span>DATE</span> August 17, 2015</div>
        <div><span>DUE DATE</span> September 17, 2015</div>
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
     Todo los derechos reservados.
    </footer>
  </body>';

    return $plantilla;
}
?>
 
