<?php
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
            <h1>Crear Evento</h1>
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
          <h3 class="card-title">Crear Evento</h3>
        </div>
        <div class="card-body">
         
                    <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-evento.php">
                          <div class="card-body">
                                <div class="form-group">
                                    <label for="usuario">Titulo Evento</label>
                                    <input type="text" class="form-control" id="titulo_evento" name="titulo_evento" placeholder="Titulo Evento">
                                </div>


                                <div class="form-group">
                                    <label for="nombre">Categoria:</label>
                                    <select name="categoria_evento" class="form-control seleccionar" style="width: 100%;" id="misterS1">
                                          <option value="0">-Seleccione-</option>
                                          <?php
                                                try {
                                                      $sql = "SELECT * FROM categoria_evento";
                                                      $resultado = $conn->query($sql);
                                                      while($cat_evento = $resultado->fetch_assoc()) { ?>
                                                            <option value="<?php echo $cat_evento['id_categoria']; ?>">
                                                                      <?php  echo $cat_evento['cat_evento'];  ?>
                                                            </option>   
                                                    <?php  }
                                                }   catch (Exception $e) {
                                                    echo "Error: " . $e->getMessage();
                                                }
                                          ?>
                                      </select>
                                  </div>

  

                                <div class="form-group">
                                  <label>Fecha Evento:</label>
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                      </div>
                                      <input  id="fecha"  type="text" class="form-control" name="fecha_evento">
                                    </div>
                                    <!-- /.input group -->
                                </div>




                              <div class="form-group">
                                  <label>Hora:</label>
                                  <div class="input-group date" id="timepicker" data-target-input="nearest">
                                    <input type="text" name="hora_evento" class="form-control datetimepicker-input" data-target="#timepicker" data-toggle="datetimepicker">
                                    <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                                    </div>
                                    </div>
                                  <!-- /.input group -->
                              </div>



                              <div class="form-group">
                                    <label for="nombre">Invitado o Ponente:</label>
                                    <select name="invitado" class="form-control seleccionar" style="width: 100%;" id="misterS2">
                                          <option value="0">-Seleccione-</option>
                                          <?php
                                                try {
                                                      $sql = "SELECT invitado_id, nombre_invitado, apellido_invitado FROM invitados ";
                                                      $resultado = $conn->query($sql);
                                                      while($invitados = $resultado->fetch_assoc()) { ?>
                                                            <option value="<?php echo $invitados['invitado_id']; ?>">
                                                                      <?php  echo $invitados['nombre_invitado'] ." ". $invitados['apellido_invitado'];  ?>
                                                            </option>   
                                                    <?php  }
                                                }   catch (Exception $e) {
                                                    echo "Error: " . $e->getMessage();
                                                }
                                          ?>
                                      </select>
                                  </div>

       


                                <!--<div class="form-group">
                                                                <label for="nombre">Invitado o Ponente:</label>
                                                                <select  name="invitado" class="form-control select2" style="width: 100%;" id="misterS3">
                                                                  <option selected="selected">Alabama</option>
                                                                  <option>Alaska</option>
                                                                  <option>California</option>
                                                                  <option>Delaware</option>
                                                                  <option>Tennessee</option>
                                                                  <option>Texas</option>
                                                                  <option>Washington</option>
                                                                </select>
                                  </div>-->






                          <div class="card-footer">
                            <input type="hidden" name="registro" value="nuevo">
                            <button type="submit" class="btn btn-primary">Añadir</button>
                          </div>
                    </form>
            
        </div>
        <!-- /.card-body -->
   
      </div>
      <!-- /.card -->
      </div>
          </div>







    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
        include_once 'templates/footer.php';
  ?>


