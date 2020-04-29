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
            <h1>Crear Categoria</h1>
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
          <h3 class="card-title">Crear Categoria</h3>
        </div>
        <div class="card-body">
         
                    <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-categoria.php">
                          <div class="card-body">
                                <div class="form-group">
                                    <label for="usuario">Nombre:</label>
                                    <input type="text" class="form-control" id="nombre_categoria" name="nombre_categoria" placeholder="Categoria">
                                </div>

                                <div class="form-group">
                                  <label>Icono:</label>
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-addon input-group-text"><i id="cambia"></i></span>
                                      </div>
                                      <input type="text" id="icono" class="form-control" name="icono" placeholder="Click para agregar icono">
                                    </div>
                                    <!-- /.input group -->

                                </div>

            
                          </div>
                          <!-- /.card-body -->

                          <div class="card-footer">
                            <input type="hidden" name="registro" value="nuevo">
                            <button type="submit" class="btn btn-primary" id="crear_registro">Añadir</button>
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



                         
                