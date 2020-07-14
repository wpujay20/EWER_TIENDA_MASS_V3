<?php 
session_start(); 
 
    if($_POST){
        $total=0;
        $SID=session_id();
        $NumeroProductos = count($_SESSION['CARRITO']);
        foreach ($_SESSION['CARRITO'] as $producto => $indi) {
           $total = $total + ($indi['P_PRECIO'] * $indi['P_CANTIDAD']);  
        } 
//        
//        $objPedBean->setId_persona($idperso);
//        $objPedBean->setPedido_monto($total);         
//        $objPedDAO->InsertarPedidoCli($objPedBean); 
//        
//         foreach ($_SESSION['CARRITO'] as $producto => $indi) {  
//             $ID_PEDIDO=$objPedDAO->ObtenerIDMaxPedido(); 
//             $objPedDAO->InsertarDetalleDePedido($indi['ID'], $ID_PEDIDO, $indi['P_CANTIDAD']); 
//         } 
    }
    ?>
    <html lang="es">
        <head>
            <meta charset="UTF-8">
            <title>Pagar</title>
            <script src="https://js.stripe.com/v3/"></script>
            <style>
                .StripeElement {
                    box-sizing: border-box; 
                    height: 40px; 
                    padding: 10px 12px; 
                    border: 1px solid transparent;
                    border-radius: 4px;
                    background-color: white; 
                    box-shadow: 0 1px 3px 0 #e6ebf1;
                    -webkit-transition: box-shadow 150ms ease;
                    transition: box-shadow 150ms ease;
                } 
                .StripeElement--focus {
                    box-shadow: 0 1px 3px 0 #cfd7df;
                } 
                .StripeElement--invalid {
                    border-color: #fa755a;
                }

                .StripeElement--webkit-autofill {
                    background-color: #fefde5 !important;
                }
            </style>
        </head>
        <body>
            <br><br> 
            
            <div class="container">
                <h2>Para Finalizar el Pedido, Por favor ingrese tu Tarjeta de Crédito</h2>
                <br>

                <h3>El Monto Total a Pagar es S/. <?php echo $total; ?>   </h3>
                <form action="CreateCharge.php" id="payment-form" method="post">
                     

                    <div class="form-row">
                        <label for="card-element">
                            <span> Tarjeta de Credito o Debito</span>
                        </label>
                        <div id="card-element"  >
                            <!-- A Stripe Element will be inserted here. -->
                        </div> 
                        <!-- Used to display form errors. -->
                        <div id="card-errors" role="alert"></div>
                    </div> 
                    <br>
                    <center>
                        <button  class="btn btn-success" style="width: 150px;"  type="submit"  >Pagar</button> 
                    </center>
                </form> 
                  <center>
                  <button class="btn btn-primary" style="width: 150px;"type="submit"  >Cancelar</button>
                    </center>
                </form>   
                
            </div>

            <?php ?>
        <script>
            // Create a Stripe client.
            var stripe = Stripe('pk_test_51Gv2cDIC1NF0bHGm7XFZvmquWdAkE1bUcVRWtNEtidxCbLMEV6o4WnJNhMoE28ezfKSQoLILfiQtAJlCzcEKPi7c0057bQgZYM');

// Create an instance of Elements.
            var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
                base: {
                    color: '#32325d',
                    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                        color: '#aab7c4'
                    }
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                }
            };

// Create an instance of the card Element.
            var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
            card.mount('#card-element');

// Handle real-time validation errors from the card Element.
            card.on('change', function (event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });

// Handle form submission.
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function (event) {
                event.preventDefault();

                stripe.createToken(card).then(function (result) {
                    if (result.error) {
                        // Inform the user if there was an error.
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                    } else {
                        // Send the token to your server.
                        stripeTokenHandler(result.token);
                    }
                });
            });

// Submit the form with the token ID.
            function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);

                // Submit the form
                form.submit();
            }
        </script>
    </body>
    <link href="../CSS/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    
    
            
            
          
    
</html>
