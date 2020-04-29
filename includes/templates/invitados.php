<?php include_once('includes/templates/header.php');?>


       
           <?php
                try{
                        require_once('includes/funciones/bd_conexion.php');
                        //Mejor es asi como lo que esta comentado la otra wuevada trolea
                        //echo  $sql = "SELECT evento_id,nombre_evento , fecha_evento , hora_evento , cat_evento , nombre_invitado , apellido_invitado FROM eventos INNER JOIN  categoria_evento ON eventos.id_cat_evento=categoria_evento.id_categoria INNER JOIN invitados ON eventos.id_inv=invitados.invitado_id ORDER BY evento_id";
                        $sql = "SELECT * from `invitados`"; 
                  

                        $resultado = $conn->query($sql);
                       
 
                }catch(Exception $e){
                    $error = $e->getMessage();
                }
           ?>

    <section class="invitados contenedor seccion">
            <h2>Invitados</h2>
            <ul class="lista-invitados clearfix">
                    <?php  while($invitados = $resultado->fetch_assoc())  {    ?>              
                            <li>
                                <div class="invitado">
                                    <a class="invitado-info" href="#invitado<?php  echo $invitados['invitado_id'];   ?>">
                                        <img src="img/invitados/<?php echo $invitados['url_imagen'] ?>" alt="imagen invitado" width="5000">
                                        <p><?php  echo $invitados['nombre_invitado']." ".$invitados['apellido_invitado']  ?></p>
                                    </a>
                                </div>
                            </li>

                            <!--Esto es del modal-->
                            <div style="display:none">
                                    <div class="invitado-info" id="invitado<?php echo  $invitados['invitado_id']; ?>">
                                            <h2><?php echo $invitados['nombre_invitado']." ".$invitados['apellido_invitado'] ?></h2>
                                            <img src="img/invitados/<?php echo $invitados['url_imagen'] ?>" alt="imagen invitado" width="300"><br><br>
                                            <p><?php echo $invitados['descripcion']  ?></p>
                                    </div>
                            </div>
                    <?php } ?>
            </ul>
    </section>

         <?php
            $conn->close();
         ?>





