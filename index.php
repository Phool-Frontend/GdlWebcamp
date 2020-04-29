<!-- Desarrollado por Ing.Phool Herrera Condezo version PHP 7.4.1 -->
<?php include_once('includes/templates/header.php');?>

    <section class="seccion contenedor">
      <h2>La mejor conferencia de diseño web en español</h2>
      <p>
        Lorem insop tengo que traiar mi cuarto para el dia del padre estar happy
        este lorem insop no esta muy chetado.Tengo un 18 en el examne de medio curso del ingeniero
        walter baldeon canchaya en el cursos de redes y telecomunicaciones dos
      </p>
    </section><!--seccion-->

    <section class="programa">
        <div class="contenedor-video">
          <video muted autoplay loop poster="chamba.jpg">
            <source src="video/chambaMp4.mp4" type="video/mp4">
            <source src="video/chambaOgv.ogv" type="video/ogv">
            <source src="video/chambaWebm.webm" type="video/webm">
          </video>
        </div><!--.contenedor-video-->
        <div class="contenido-programa">
            <div class="contenedor">
                <div class="programa-evento">
                    <h2>Programa del evento</h2>
                    <?php
                try{
                        require_once('includes/funciones/bd_conexion.php');
                        //Mejor es asi como lo que esta comentado la otra wuevada trolea
                        //echo  $sql = "SELECT evento_id,nombre_evento , fecha_evento , hora_evento , cat_evento , nombre_invitado , apellido_invitado FROM eventos INNER JOIN  categoria_evento ON eventos.id_cat_evento=categoria_evento.id_categoria INNER JOIN invitados ON eventos.id_inv=invitados.invitado_id ORDER BY evento_id";
                        $sql = "SELECT * FROM `categoria_evento`"; 
                        $resultado = $conn->query($sql);
                        }catch(Exception $e){
                            $error = $e->getMessage();
                        }
           ?>
                    <nav class="menu-programa">
                        <?php   while ($cat = $resultado->fetch_array(MYSQLI_ASSOC)){ ?>
                            <?php  $categoria = $cat['cat_evento']; ?>
                                <a href="#<?php  echo strtolower($categoria)  ?>">
                                    <i class="fa <?php $cat['icono'] ?>" aria-hidden="true"></i><?php echo $categoria ?>
                                </a>    
                        <?php   } ?>    
                    </nav>
                    
                    <?php
                            try{
                                    require_once('includes/funciones/bd_conexion.php');
                                    
                                    $sql = "SELECT `evento_id`,`nombre_evento`,`fecha_evento`,`hora_evento`,`cat_evento`,`nombre_invitado`,`apellido_invitado`"; 
                                    $sql .= "FROM `eventos`";
                                    $sql .= "INNER JOIN `categoria_evento`";
                                    $sql .= "ON eventos.id_cat_evento=categoria_evento.id_categoria ";
                                    $sql .= "INNER JOIN `invitados` ";
                                    $sql .= "ON eventos.id_inv=invitados.invitado_id ";
                                    $sql .= "AND eventos.id_cat_evento = 1 ";
                                    $sql .= "ORDER BY `evento_id` LIMIT 2;";
                                    $sql .= "SELECT `evento_id`,`nombre_evento`,`fecha_evento`,`hora_evento`,`cat_evento`,`nombre_invitado`,`apellido_invitado`"; 
                                    $sql .= "FROM `eventos`";
                                    $sql .= "INNER JOIN `categoria_evento`";
                                    $sql .= "ON eventos.id_cat_evento=categoria_evento.id_categoria ";
                                    $sql .= "INNER JOIN `invitados` ";
                                    $sql .= "ON eventos.id_inv=invitados.invitado_id ";
                                    $sql .= "AND eventos.id_cat_evento = 2 ";
                                    $sql .= "ORDER BY `evento_id` LIMIT 2;";
                                    $sql .= "SELECT `evento_id`,`nombre_evento`,`fecha_evento`,`hora_evento`,`cat_evento`,`nombre_invitado`,`apellido_invitado`"; 
                                    $sql .= "FROM `eventos`";
                                    $sql .= "INNER JOIN `categoria_evento`";
                                    $sql .= "ON eventos.id_cat_evento=categoria_evento.id_categoria ";
                                    $sql .= "INNER JOIN `invitados` ";
                                    $sql .= "ON eventos.id_inv=invitados.invitado_id ";
                                    $sql .= "AND eventos.id_cat_evento = 3 ";
                                    $sql .= "ORDER BY `evento_id` LIMIT 2;";
                                    
                                    }catch(Exception $e){
                                        $error = $e->getMessage();
                                    }
                     ?>
            
                     <?php $conn->multi_query($sql); ?>

                     <?php
                        do {
                            $resultado = $conn->store_result();
                            $row = $resultado->fetch_all(MYSQLI_ASSOC);?>

                            <?php $i= 0;  ?>
                            <?php  foreach($row as $evento): ?>    
                                <?php   if($i % 2 == 0) { ?>
                                
                                    <div id="<?php echo strtolower($evento['cat_evento']) ?>" class="info-curso ocultar clearfix">
                            <?php  } ?>
                                    <div class="detalle-evento">
                                        <h3><?php echo $evento['nombre_evento'] ?></h3>
                                        <p><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo $evento['hora_evento']; ?></p>
                                        <p><i class="fas fa-calendar-alt"></i><?php echo $evento['fecha_evento']; ?></p>
                                        <p><i class="fa fa-user" aria-hidden="true"></i><?php echo $evento['nombre_invitado']."".$evento['apellido_invitado']; ?></p>
                                    </div>
                                    
                            <?php if($i % 2 == 1):?>
                                    <a href="calendario.php" class="button float-right">Ver todos</a>
                                </div><!--#talleres-->
                            <?php   endif; ?>
                            <?php   $i++; ?>
                            <?php  endforeach; ?>
                            <?php  $resultado->free(); ?>
                       <?php  } while ($conn->more_results() && $conn->next_result());
                     
                     ?>

                    
                    
                </div><!--.programa-evento-->
            </div><!--.contenedor-->
        </div><!---.contenido-programa-->
    </section><!--.programa-->
  </header>

  <?php include_once('includes/templates/invitados.php');   ?>
<!------------------------------Parallax-------------------------->
      <div class="contador parallax">
          <div class="contenedor">
              <ul class="resumen-evento clearfix">
                  <li><p class="numero">0</p>Invitados</li>
                  <li><p class="numero">0</p>Talleres</li>
                  <li><p class="numero">0</p>Dias</li>
                  <li><p class="numero">0</p>Conferencias</li>
              </ul>

          </div>
      </div>

      <section class="precios seccion">
          <h2>Precios</h2>
          <div class="contenedor">
              <ul class="lista-precios clearfix">
                  <li>
                      <div class="tabla-precio">
                          <h3>Pase por dia</h3>
                          <p class="numero">$30</p>
                          <ul>
                              <li>Bocadillos Gratis</li>
                              <li>Todas las conferencias</li>
                              <li>Todos los talleres</li>
                          </ul>
                          <a href="#" class="button hollow">Comprar</a>
                      </div>
                  </li>
                  <li>
                    <div class="tabla-precio">
                        <h3>Todos los dias</h3>
                        <p class="numero">$50</p>
                        <ul>
                            <li>Bocadillos Gratis</li>
                            <li>Todas las conferencias</li>
                            <li>Todos los talleres</li>
                        </ul>
                        <a href="#" class="button">Comprar</a>
                    </div>
                </li>

                <li>
                  <div class="tabla-precio">
                      <h3>Pase por 2 dia</h3>
                      <p class="numero">$45</p>
                      <ul>
                          <li>Bocadillos Gratis</li>
                          <li>Todas las conferencias</li>
                          <li>Todos los talleres</li>
                      </ul>
                      <a href="#" class="button hollow">Comprar</a>
                  </div>
              </li>
              </ul>
          </div>
      </section>

      <div id="mapa" class="mapa"></div>

        <section class="seccion">
            <h2>Testimoniales</h2>
            <div class="testimoniales contenedor clearfix">
                      <div class="testimonial">
                          <blockquote>
                              <p>hola mi testimonio es que el ing phool cambio mi vida con su sistema de venta de cursos aprendi como mrda en sus curso valio la pena haber invertido tiempo y dinero en su curso lo recomiendo de corazon</p>
                              <footer class="info-testimonial clearfix">
                                  <img src="img/testimonial.jpg" alt="imagen testimonial">
                                  <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
                              </footer>
                            </blockquote>
                      </div><!--Fin del testimonial-->
                      <div class="testimonial">
                        <blockquote>
                            <p>hola mi testimonio es que el ing phool cambio mi vida con su sistema de venta de cursos aprendi como mrda en sus curso valio la pena haber invertido tiempo y dinero en su curso lo recomiendo de corazon</p>
                            <footer class="info-testimonial clearfix">
                                <img src="img/testimonial.jpg" alt="imagen testimonial">
                                <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
                            </footer>
                          </blockquote>
                    </div><!--Fin del testimonial-->
                    <div class="testimonial">
                      <blockquote>
                          <p>hola mi testimonio es que el ing phool cambio mi vida con su sistema de venta de cursos aprendi como mrda en sus curso valio la pena haber invertido tiempo y dinero en su curso lo recomiendo de corazon</p>
                          <footer class="info-testimonial clearfix">
                              <img src="img/testimonial.jpg" alt="imagen testimonial">
                              <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
                          </footer>
                        </blockquote>
                  </div><!--Fin del testimonial-->
            </div>
        </section>
        <div class="newsletter parallax">
            <div class="contenido contenedor">
                <p>Registrate al newsletter:</p>
                <h3>gdlwebcamp</h3>
                <a href="#mc_embed_signup" class="boton_newsletter button transparente">Registro</a>
            </div><!--.contenido-->
        </div><!--.newsletter-->

        <section class="seccion">
          <h2>Faltan</h2>
          <div class="cuenta-regresiva contenedor">
            <ul class="clearfix">
              <li><p id="dias" class="numero"></p>dias</li>
              <li><p id="horas" class="numero"></p>horas</li>
              <li><p id="minutos" class="numero"></p>minutos</li>
              <li><p id="segundos" class="numero"></p>segundos</li>

            </ul>
          </div>
        </section>

   

    
<!--LISTO EL MELCHIP DE FORMULARIO******************************************************************************************-->
                <!-- Begin Mailchimp Signup Form -->
                <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
                <style type="text/css">
                  #mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
                  
                </style>
<div style="display:none;">
                <div id="mc_embed_signup">
                <form action="https://phool.us4.list-manage.com/subscribe/post?u=57ba255a24497d249aa7d2b4c&amp;id=29bc8b3e47" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                    <div id="mc_embed_signup_scroll">
                  <h2>Subscribe al Newsletter y no te pierdas nada de este evento</h2>
                <div class="indicates-required"><span class="asterisk">*</span> es obligatorio</div>
                <div class="mc-field-group">
                  <label for="mce-EMAIL">Correo electronico  <span class="asterisk">*</span>
                </label>
                  <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
                </div>
                  <div id="mce-responses" class="clear">
                    <div class="response" id="mce-error-response" style="display:none"></div>
                    <div class="response" id="mce-success-response" style="display:none"></div>
                  </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_57ba255a24497d249aa7d2b4c_29bc8b3e47" tabindex="-1" value=""></div>
                    <div class="clear"><input type="submit" value="Suscribirse" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                    </div>
                </form>
                </div>
                <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
                <!--End mc_embed_signup-->
</div>

<?php include_once('includes/templates/footer.php');?>