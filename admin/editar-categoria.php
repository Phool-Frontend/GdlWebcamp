<?php


 $id = $_GET['id'];
 
 if(!filter_var($id,FILTER_VALIDATE_INT)){
  die("Error!");
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
            <h1>Editar Categoria</h1>
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
          <h3 class="card-title">Edita Categoria</h3>
        </div>
        <div class="card-body">
         
<?php
        $sql = "SELECT * FROM categoria_evento WHERE id_categoria = $id ";
        $resultado = $conn->query($sql);
        $categoria = $resultado->fetch_assoc();
?>



                    <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-categoria.php">
                          <div class="card-body">
                                <div class="form-group">
                                    <label for="usuario">Nombre:</label>
                                    <input type="text" class="form-control" id="nombre_categoria" name="nombre_categoria" placeholder="Categoria" value="<?php   echo $categoria['cat_evento'];     ?>">
                                </div>

                                <div class="form-group">
                                  <label>Icono:</label>
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-addon input-group-text"><i></i></span>
                                      </div>
                                      <input type="text" id="icono" class="form-control" name="icono" placeholder="Click para agregar icono" value="<?php   echo $categoria['icono'];     ?>">
                                    </div>
                                    <!-- /.input group -->

                                </div>

            
                          </div>
                          <!-- /.card-body -->

                          <div class="card-footer">
                            <input type="hidden" name="registro" value="actualizar">
                            <input type="hidden" name="id_registro" value="<?php   echo   $id;   ?>">
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



                         
                