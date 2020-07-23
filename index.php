<?php

include './TEMPLATES/cabeceraCliente.php';
 
?>
<div class="main-content bottom-0">
<div class="container">
    <!-- banner -->
    <div class="banner pad">
            <!-- heading -->
            <h2>Bienvenido a Mass<br><span> ¡Precios mas bajos cerca de ti! </span></h2>
            <!-- paragraph -->
            <p>Adquiere tus productos en nuestro nuevo Sistema de Ventas Web</p>
    </div>
</div>

<!-- hero -->
<div class="hero pad">
    <div class="container">
            <div class="hero-content">
                    <!-- heading -->
                    <h2>En estos momentos de cuarentena</h2>
                    <!-- paragraph -->
                    <p>Estuvimos y estaremos siempre contigo</p>
                    <!-- button -->
                    <a href="#" class="btn btn-warning">#yomequedoencasa</a>
            </div>
    </div>
</div>

<!-- benefits -->
<div class="benefits pad">
    <div class="container">
            <div class="default-heading">	
                    <!-- heading -->
                    <h2>Te ofrecemos</h2>
            </div>
            <div class="row">
                    <div class="col-md-3 col-sm-6">
                            <!-- benefits item -->
                            <div class="benefits-item">
                                    <!-- icon -->
                                    <i class="fa fa-desktop"></i>
                                    <!-- heading -->
                                    <h3>Pertenencia</h3>
                                    <!-- paragraph -->
                                    <p>Se parte de un sólido grupo que busca entre sus principales objetivos darte herramientas que beneficien a nuestra sociedad guatemalteca.</p>
                            </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                            <!-- benefits item -->
                            <div class="benefits-item">
                                    <!-- icon -->
                                    <i class="fa fa-paper-plane"></i>
                                    <!-- heading -->
                                    <h3>Garantia</h3>
                                    <!-- paragraph -->
                                    <p>El abastecimiento de cada Tienda Mass está garantizado ya que contamos con una red de proveedores de marcas y productos de calidad.</p>
                            </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                            <!-- benefits item -->
                            <div class="benefits-item">
                                    <!-- icon -->
                                    <i class="fa fa-briefcase"></i>
                                    <!-- heading -->
                                    <h3>Orden</h3>
                                    <!-- paragraph -->
                                    <p>Nos especializamos en capacitarte de manera que ejerzas una administración efectiva para bien del negocio y de tu economía.</p>
                            </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                            <!-- benefits item -->
                            <div class="benefits-item">
                                    <!-- icon -->
                                    <i class="fa fa-envelope"></i>
                                    <!-- heading -->
                                    <h3>Prosperidad</h3>
                                    <!-- paragraph -->
                                    <p>Nos interesa que a través de una BAJA INVERSION tu negocio genere ganancias en dos vías, comercial y personalmente</p>
                            </div>
                    </div>
            </div>
    </div>
</div>

<!-- call to action -->
<div class="cta">
    <div class="container">
            <div class="cta-content">
                    <!-- heading -->
                    <h3> Para cualquier otra <span>CONSULTA</span></h3>
                    <!-- paragraph -->
                    <p> puedes contactarte con nosotros en tiendasmass@market.com</p>
            </div>
    </div>
</div>

<!-- testimonial -->


<!-- blog -->
<div class="blog pad">
    <div class="container">
            <div class="default-heading">	
                    <!-- heading -->
                    <h2>Acerca de nosotros</h2>
            </div>
            <div class="row">
                    <div class="col-md-6">
                            <!-- blog entry -->
                            <div class="entry">
                                    <!-- blog post image -->
                                    <div class="entry-pic">
                                            <img class="img-responsive" src="img/blog/1.jpg" alt="Blog Image" />
                                    </div>
                                    <!-- blog content details -->
                                    <div class="entry-post">
                                            <!-- blog information -->
                                           
                                            <!-- blog title -->
                                            <h3>Mision</h3>
                                            <!-- paragraph -->
                                            <p> MEJORAR NUESTRA CULTURA ORGANIZACIONAL DE MANERA SÓLIDA y DIFERENTE, abastecida de productos y marcas líderes para ofrecerlos a nuestros clientes</p>
                                    </div>
                                    <div class="clearfix"></div>
                            </div>
                    </div>
                    <div class="col-md-6">
                            <!-- blog entry -->
                            <div class="entry">
                                    <!-- blog post image -->
                                    <div class="entry-pic">
                                            <img class="img-responsive" src="img/blog/2.jpg" alt="Blog Image" />
                                    </div>
                                    <!-- blog content details -->
                                    <div class="entry-post">
                                            <!-- blog information -->
                                      
                                            <!-- blog title -->
                                            <h3>Vision</h3>
                                            <!-- paragraph -->
                                            <p>Llegar a ser una de las cadenas de tiendas mas exitosas a nivel nacional e internacional, mejorando con el paso del tiempo y mantenter nuestra franquicia lo mas alto posible</p>
                                    </div>
                                    <div class="clearfix"></div>
                            </div>
                    </div>
            </div>
            <div class="row">
                    
                    
            </div>
        <?php if(empty($_SESSION['id_usuario'])){ ?>
            <div class="blog-btn">
                    <!-- button -->
                    <a href="VISTAS/MANTENIMIENTOS/LoginVendedor.php" class="btn btn-warning">¿Eres un Vendedor?</a>
            </div>
        <?php }  ?>
    </div>
</div>

</div>


<?php

include './TEMPLATES/pieCliente.php';

