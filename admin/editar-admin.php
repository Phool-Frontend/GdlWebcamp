<?php
        include_once 'funciones/sesiones.php';
        include_once 'templates/header.php';
        include_once 'funciones/funciones.php';

        $id = $_GET['id'];

        if(!filter_var($id,FILTER_VALIDATE_INT)){
            die("Error!");
        }
        
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
            <h1>Editar Administrador</h1>
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
          <h3 class="card-title">Puedes editar los datos del administrador</h3>
        </div>
        <div class="card-body">

<?php   //Aqui esta el error wey
          $sql = "SELECT * FROM `admins` WHERE `id_admin` = $id ";
          $resultado = $conn->query($sql);
          $admin = $resultado->fetch_assoc();
?>
                    <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-admin.php">
                          <div class="card-body">
                                <div class="form-group">
                                    <label for="usuario">Usuario:</label>
                                    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" value="<?php echo $admin['usuario']?>">
                                </div>
                                <div class="form-group">
                                    <label for="nombre">Nombre:</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Tu nombre Completo" value="<?php echo $admin['nombre']?>">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password: </label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password para Iniciar Sesion">
                                </div>
                          </div>
                          <!-- /.card-body -->

                          <div class="card-footer">
                            <input type="hidden" name="registro" value="actualizar">
                            <input type="hidden" name="id_registro" value="<?php echo $id; ?>">
                            <button type="submit" class="btn btn-primary">Guardar</button>
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
