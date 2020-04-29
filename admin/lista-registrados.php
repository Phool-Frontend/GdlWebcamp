<?php
        include_once 'funciones/sesiones.php';
        include_once 'funciones/funciones.php';
        include_once 'templates/header.php';
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
            <h1>Listado de Personas Registradas</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!--xxx Main content -->
         
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Maneja los visitantes registrados</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive-sm table-responsive-md table-hover table-bordered table-sm">
              <table id="registros" class="table">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Fecha</th>
                  <th>Articulos</th>
                  <th>Talleres</th>
                  <th>Regalo</th>
                  <th>Compra</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        try {
                          $sql = "SELECT registrados.*, regalos.nombre_regalo FROM registrados ";
                          $sql .= " JOIN regalos ";
                          $sql .= " ON registrados.regalo = regalos.ID_regalo ";
                          $resultado = $conn->query($sql);
                        } catch (Exception $e) {
                          $error = $e->getMessage();
                          echo $error;
                        }
                       while($registrado = $resultado->fetch_assoc() ) { ?>
                            <tr>
                                <td>
                                    <?php  echo $registrado['nombre_registrado'] ." ". $registrado['apellido_registrado'];   
                                        $pagado = $registrado['pagado'];
                                        if($pagado){
                                          echo '<span class="badge bg-green">Pagado</span>';
                                        }else{
                                          echo '<span class="badge bg-red">No Pagado</span>';
                                        }
                                    ?>
                                </td>
                                <td><?php  echo $registrado['email_registrado']; ?></td>
                                <td><?php  echo $registrado['fecha_registro']; ?></td>
                                <td>
                                    <?php  
                                          $articulos = json_decode($registrado['pases_articulos'], true);
                                          $arreglo_articulos = array(
                                            'un_dia' => 'Pase 1 dia',
                                            'pase_2dias' => 'Pase 2 dias',
                                            'pase_completo' => 'Pase completo',
                                            'camisas' => 'Camisas',
                                            'etiquetas' => 'Etiqueta'
                                          ); 


                                        if (is_array($articulos) || is_object($articulos)):
                                              foreach($articulos as $llave => $articulo){
                                                if(is_array($articulo) && array_key_exists('cantidad', $articulo)){
                                                  echo  "<b>" . $articulo['cantidad'] . "</b>" ." " . $arreglo_articulos[$llave] . "<br>";
                                                }else{
                                                  echo "<b>" . $articulo . "</b>" . " " .$arreglo_articulos[$llave] . "<br>";
                                                }
                                                
                                              }
                                        endif;
                                    ?>
                                </td>
                                <td>
                                    <?php  
                                          $eventos_resultado = $registrado['talleres_registrados']; 
                                          $talleres = json_decode($eventos_resultado, true );

                                        
                                       
                                         
                                            $talleres = implode("', '",(array)$talleres['eventos']);
                                         




                                          $sql_talleres = "SELECT nombre_evento, fecha_evento, hora_evento FROM eventos WHERE evento_id IN ('$talleres')";
                                          $resultado_talleres = $conn->query($sql_talleres);
                                          

                                          while ( $eventos = $resultado_talleres->fetch_assoc()) {
                                              echo $eventos['nombre_evento']." ". $eventos['fecha_evento']." ".$eventos['hora_evento'] . "<br>";
                                          }
                                    ?>
                                </td>
                                <td><?php  echo $registrado['nombre_regalo']; ?></td>
                                <td>$ <?php  echo $registrado['total_pagado']; ?></td>
                                <td>
                                    <a href="editar-registro.php?id=<?php echo $registrado['ID_Registrado']; ?>" class="btn bg-orange btn-flat margin">
                                        <i class="nav-icon fas fa-edit"></i>
                                    </a>
                                    <a href="#" data-id="<?php echo $registrado['ID_Registrado']; ?>" data-tipo="registrado" class="btn bg-maroon btn-flat margin borrar_registro">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Fecha</th>
                  <th>Articulos</th>
                  <th>Talleres</th>
                  <th>Regalo</th>
                  <th>Compra</th>
                  <th>Acciones</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

    <!--xxx /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
        include_once 'templates/footer.php';
  ?>
