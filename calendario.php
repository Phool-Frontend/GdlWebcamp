<?php include_once 'includes/templates/header.php'; 

?>

  <section class="section contenedor">
    <h2>La mejor conferencia de diseño web en español</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin diam felis, lacinia a mauris quis, facilisis vestibulum mauris. Proin at elementum elit, vitae placerat urna. Nullam varius erat augue.</p>
  </section>


  <section class="section contenedor">
      <h2>Calendario de Eventos</h2>

        <?php
        try {
           require_once('includes/funciones/bd_conexion.php');
           $sql = "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
           $sql .= " FROM eventos ";
           $sql .= " INNER JOIN categoria_evento ";
           $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
           $sql .= " INNER JOIN invitados ";
           $sql .= " ON eventos.id_inv = invitados.invitado_id ";
           $sql .= " ORDER BY evento_id ";
           $resultado = $conn->query($sql);
        } 
        
        catch (\Exception $e) {
           echo $e->getMessage();
        }
       
         ?>

      <div class="calendario">
        <?php
          while ($eventos = $resultado->fetch_assoc()) {

            //obtiene la fecha del eventos

            $fecha = $eventos['fecha_evento'];

            $evento = array(
               'titulo' => $eventos['nombre_evento'],
               'fecha' => $eventos['fecha_evento'],
               'hora' => $eventos['hora_evento'],
               'categoria' => $eventos['cat_evento'],
               'icono' => $eventos['icono'],
               'invitado' => $eventos['nombre_invitado'] . " " . $eventos['apellido_invitado']
            );

            $calendario[$fecha][] = $evento;

            ?>


        <?php  }  //while de fetch_assoc() ?>

        <?php
        //Imprime todos los Eventos
        function fechaCastellano ($fecha) {
         $fecha = substr($fecha, 0, 10);
         $numeroDia = date('d', strtotime($fecha));
         $dia = date('l', strtotime($fecha));
         $mes = date('F', strtotime($fecha));
         $anio = date('Y', strtotime($fecha));
         $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
         $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
         $nombredia = str_replace($dias_EN, $dias_ES, $dia);
         $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
         $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
         $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
         return $nombredia." ".$numeroDia." de ".$nombreMes." de ".$anio;
       }
        
        
        foreach($calendario as $dia => $lista_eventos) { ?>
           <h3>
               <i class="fas fa-calendar-alt"></i>
               <?php
                  //unix
                  setlocale(LC_TIME, 'es_ES');
                  //Windows este da sabado con incognito
                  //setlocale(LC_TIME, 'spanish');

               
                  echo fechaCastellano($dia); 
           
           
                 ?>

                  

           </h3>
           <?php foreach($lista_eventos as $evento) { ?>
             <div class="dia">
                <p class="titulo"><?php echo $evento['titulo']; ?></p>
                <p class="hora">
                   <i class="far fa-clock" aria-hidden="true"></i>
                   <?php echo $evento['fecha'] . " " . $evento['hora']; ?>
                </p>
                <p>
                  <i class="fa <?php echo $evento['icono']; ?>" aria-hidden="true"></i>
                  <?php echo $evento['categoria']; ?></p>
                <p>
                   <i class="fa fa-user" aria-hidden="true"></i>
                   <?php echo $evento['invitado']; ?>
                </p>

             </div>

          <?php } // fin foreach eventos ?>
        <?php } //fin foreach de dias?>



      </div>

      <?php $conn->close(); ?>


  </section>




<?php include_once 'includes/templates/footer.php'; ?>
