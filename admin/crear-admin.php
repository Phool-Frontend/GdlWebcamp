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
            <h1>Crear Administrador</h1>
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
          <h3 class="card-title">Crear Administrador</h3>
        </div>
        <div class="card-body">
         
                    <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-admin.php">
                          <div class="card-body">
                                <div class="form-group">
                                    <label for="usuario">Usuario:</label>
                                    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario">
                                </div>
                                <div class="form-group">
                                    <label for="nombre">Nombre:</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Tu nombre Completo">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password: </label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password para Iniciar Sesion">
                                </div>
                                <div class="form-group">
                                    <label for="password">Repetir Password: </label>
                                    <input type="password" class="form-control" id="repetir_password" name="repetir_password" placeholder="Password para Iniciar Sesion">
                                    <span id="resultado_password" class="help-block"></span>
                                </div>
                          </div>
                          <!-- /.card-body -->

                          <div class="card-footer">
                            <input type="hidden" name="registro" value="nuevo">
                            <button type="submit" class="btn btn-primary" id="crear_registro_admin">Añadir</button>
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
