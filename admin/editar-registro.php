<?php
        $id = $_GET['id'];
        if(!filter_var($id, FILTER_VALIDATE_INT)){
          die("Error");
        }
        
        include_once 'funciones/sesiones.php';
        include_once 'templates/header.php';
        include_once 'funciones/funciones.php';
        include_once 'templates/barra.php';
        include_once 'templates/navegacion.php';
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar Registro de Usuario Manual</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">



    <div class="row">
              <div class="col-md-8">


      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Editar Usuario</h3>
        </div>
        <div class="card-body">

<?php
        $sql = " SELECT * FROM registrados WHERE ID_Registrado = $id ";
        $resultado = $conn->query($sql);
        $registrado = $resultado->fetch_assoc();
        
?>
                    <form  class="editar_registrado" role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-registrado.php">
                              <div class="card-body">
                                          <div class="form-group">
                                              <label for="nombre">Nombre:</label>
                                              <input value="<?php echo $registrado['nombre_registrado'];  ?>" type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" >
                                          </div>
                                          <div class="form-group">
                                              <label for="apellido">Apellido:</label>
                                              <input value="<?php echo $registrado['apellido_registrado'];  ?>" type="text" class="form-control" id="apellido" name="apellido" placeholder="apellido">
                                          </div>
                                          <div class="form-group">
                                              <label for="email">Email:</label>
                                              <input value="<?php echo $registrado['email_registrado'];  ?>" type="email" class="form-control" id="email" name="email" placeholder="Email">
                                          </div>
<?php
          $pedido = $registrado['pases_articulos'];
          $boletos = json_decode($pedido,true);

?>
 
                                          <div class="form-group">
                                                <div id="paquetes" class="paquetes">
                                                        <h3>Elige el número de boletos</h3>
                                                        <ul class="lista-precios clearfix row">
                                                          <li class="col-md-4">
                                                              <div class="tabla-precio text-center">
                                                                  <h3>Pase por dia (viernes)</h3>
                                                                  <p class="numero">$30</p>
                                                                  <ul>
                                                                      <li>Bocadillos Gratis</li>
                                                                      <li>Todas las conferencias</li>
                                                                      <li>Todos los talleres</li>
                                                                  </ul>
                                                                
                                                                  <div class="orden">
                                                                    <label for="pase_dia">Boletos deseados:</label>
                                                                    <input value="<?php echo $boletos['un_dia']['cantidad']; ?>" type="number" class="form-control" min="0" id="pase_dia" size="3" name="boletos[un_dia][cantidad]" placeholder="0">
                                                                    <input type="hidden" value="30" name="boletos[un_dia][precio]">
                                                                  </div>
                                                                </div>
                                                          </li>
                                                          <li class="col-md-4">
                                                            <div class="tabla-precio text-center">
                                                                <h3>Todos los dias</h3>
                                                                <p class="numero">$50</p>
                                                                <ul>
                                                                    <li>Bocadillos Gratis</li>
                                                                    <li>Todas las conferencias</li>
                                                                    <li>Todos los talleres</li>
                                                                </ul>
                                                                <div class="orden">
                                                                  <label for="pase_completo">Boletos deseados:</label>
                                                                  <input value="<?php echo $boletos['pase_completo']['cantidad']; ?>" type="number" class="form-control" min="0" id="pase_completo" size="3" name="boletos[completo][cantidad]" placeholder="0">
                                                                  <input type="hidden" value="50" name="boletos[completo][precio]">
                                                                </div>
                                                            </div>
                                                        </li>

                                                        <li class="col-md-4">
                                                          <div class="tabla-precio text-center">
                                                              <h3>Pase por 2 dia (viernes y sábado)</h3>
                                                              <p class="numero">$45</p>
                                                              <ul>
                                                                  <li>Bocadillos Gratis</li>
                                                                  <li>Todas las conferencias</li>
                                                                  <li>Todos los talleres</li>
                                                              </ul>
                                                              <div class="orden">
                                                                <label for="pase_dosdias">Boletos deseados:</label>
                                                                <input value="<?php echo $boletos['pase_2dias']['cantidad']; ?>" type="number" class="form-control" min="0" id="pase_dosdias" size="3"  name="boletos[2dias][cantidad]" placeholder="0">
                                                                <input type="hidden" value="45" name="boletos[2dias][precio]">
                                                              </div>
                                                </div><!--#paquetes-->
                                          </div><!--.form-group -->

                                         <div class="form-group">
                                                  <div id="eventos" class="eventos clearfix">
                                                            <h3>Elige los talleres</h3>
                                                            <div class="caja">
                                                            <?php
                                                                    $eventos = $registrado['talleres_registrados'];
                                                                    $id_eventos_registrados = json_decode($eventos, true);
                                    

                                                                    try {
                                                                      $sql = "SELECT eventos.*,categoria_evento.cat_evento, invitados.nombre_invitado, invitados.apellido_invitado";
                                                                      $sql .= " FROM eventos";
                                                                      $sql .= " JOIN categoria_evento";
                                                                      $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                                                                      $sql .= " JOIN invitados ";
                                                                      $sql .= " ON eventos.id_inv = invitados.invitado_id ";
                                                                      $sql .= " ORDER BY eventos.fecha_evento, eventos.id_cat_evento, eventos.hora_evento ";


                                                                      $resultado = $conn->query($sql);
                                                                    } catch (Exception $e ) {
                                                                        echo $e->getMessage();
                                                                    }
                                                                    $eventos_dias = array();
                                                                    while($eventos = $resultado->fetch_assoc()){
                                                                      

                                                                        $fecha = $eventos['fecha_evento'];
                                                                        setlocale(LC_TIME, 'es.UTF-8');
                                                                        $dia_semana = strftime("%A", strtotime($fecha));  

                                                                        $categoria = $eventos['cat_evento'];

                                                                        $dia = array(
                                                                          'nombre_evento' => $eventos['nombre_evento'],
                                                                          'hora' =>  $eventos['hora_evento'],
                                                                          'id' => $eventos['evento_id'],
                                                                          'nombre_invitado' => $eventos['nombre_invitado'],
                                                                          'apellido_invitado' => $eventos['apellido_invitado']
                                                                        );
                                                                        $eventos_dias[$dia_semana]['eventos'][$categoria][] = $dia;
                                                                    }
                                                            ?>
                                                            <?php foreach( $eventos_dias as $dia => $eventos ) {    ?>
                                                                    <div id="<?php echo str_replace('á','a',$dia); ?>" class="contenido-dia clearfix ">
                                                                      <h4 class="text-center nombre_dia"><?php echo $dia; ?></h4>

<div class="row">
                                                                      <?php 
                                                                          foreach ($eventos['eventos'] as $tipo => $evento_dia ): ?>
                                                                              <div class="col-md-4">
                                                                                  <p><?php echo $tipo; ?></p>
                                                                                  <?php foreach ($evento_dia as $evento) { ?>
  
                                                                                      <label>
                                                                                        <div class="icheck-primary d-inline">
                                                                                            <input <?php echo (in_array($evento['id'], $id_eventos_registrados['eventos']) ? 'checked' : '');   ?> type="checkbox" name="registro_evento[]" id="<?php echo $evento['id']; ?>" value="<?php echo $evento['id']; ?>">
                                                                                            <label for="<?php echo $evento['id']; ?>"></label>
                                                                                        </div>
                                                                                            <time><?php echo $evento['hora']; ?></time> <?php echo $evento['nombre_evento']; ?>
                                                                                            <br>
                                                                                            <span class="autor"><strong><?php echo $evento['nombre_invitado']." ". $evento['apellido_invitado']; ?></strong></span>
                                                                                      </label>
                                                                                  <?php } //foreach?>
                                                                              </div>
                                                                          <?php endforeach; ?>
   </div>
                                                                    </div><!--.contenido dia-->
                                                            <?php } ?>
                                                            </div><!--.caja-->
                                                    </div><!--#eventos-->
                                         </div>


                                          <div class="form-group">
                                                      <div id="resumen" class="resumen clearfix">
                                                                  <h3>Pago y Extras</h3>
                                                                  <br>
                                                                  <div class="caja clearfix row">
                                                                  <div class="extras col-md-6">
                                                                      <div class="orden">
                                                                        <label for="camisa_evento" >Camisa del evento $10<small>(promocion 7% dto.)</small></label>
                                                                        <input value="<?php echo $boletos['camisas'];  ?>" type="number" min="0" class="form-control" id="camisa_evento" name="pedido_extra[camisas][cantidad]" size="3" placeholder="0">
                                                                        <input type="hidden" value="10" name="pedido_extra[camisas][precio]">
                                                                      </div><!--.orden-->
                                                                      <div class="orden">
                                                                        <label for="etiquetas">Paquete de 10 etiquetas $2<small>(HTML5, CSS3, JavaScript,Chrome)</small></label>
                                                                        <input value="<?php echo $boletos['etiquetas'];  ?>" type="number" min="0" class="form-control" id="etiquetas" name="pedido_extra[etiquetas][cantidad]" size="3" placeholder="0">
                                                                        <input type="hidden" value="2" name="pedido_extra[etiquetas][precio]">
                                                                      </div><!--.orden-->
                                                                      <div class="orden">
                                                                        <label for="regalo">Seleccione un regalo</label><br>
                                                                        <select id="regalo" name="regalo" required class="form-control select2">
                                                                            <option value="">-- Seleccione un regalo --</option>
                                                                            <option value="2" <?php echo ($registrado['regalo'] == 2 ) ?  'selected' : ''  ?>  >Etiquetas</option>
                                                                            <option value="1" <?php echo ($registrado['regalo'] == 1 ) ?  'selected' : ''  ?>  >Pulsera</option>
                                                                            <option value="3" <?php echo ($registrado['regalo'] == 3 ) ?  'selected' : ''  ?>  >Plumas</option>
                                                                        </select>
                                                                      </div><!--.orden--><br>
                                                                      <br>                                              
                                                                      <input type="button" id="calcular" class="btn btn-success" value="Calcular">
                                                                  </div><!--Extras-->
                                                              
                                                                            <div class="total col-md-6">
                                                                                <p>Resumen:</p>
                                                                                <div id="lista-productos"></div>
                                                                                <p>Total YA PAGADO: <?php echo (float) $registrado['total_pagado'];  ?></p>
                                                                                <p>Total:</p>
                                                                                <div id="suma-total">

                                                                                </div>
                                                                                

                                                                            </div><!--.total-->
                                                                        </div><!--.caja-->
                                                        </div><!--#resumen-->
                                          </div>    
                                </div>
                          <!-- /.card-body -->

                          <div class="card-footer">
                            <input type="hidden" name="total_pedido" id="total_pedido">
                            <input type="hidden" name="total_descuento" id="total_descuento" value="total_descuento">
                            <input type="hidden" name="registro" value="actualizar">
                            <input type="hidden" name="id_registro" value="<?php echo $registrado['ID_Registrado'];  ?>">
                            <input type="hidden" name="fecha_registro" value="<?php echo $registrado['fecha_registro'];  ?>">
                            <button type="submit" class="btn btn-primary" id="btnRegistro">Guardar</button>
                          </div>
                          
                    </form>
            
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      </div>
          </div>

   <br><br><br><br><br><br><br>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


























  

  


  <?php
        include_once 'templates/footer.php';
  ?>
